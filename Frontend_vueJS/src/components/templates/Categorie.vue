<script setup>
import { ref, onMounted } from "vue";
import categorieService from "../../services/CategorieService";

const categories = ref([]);
const newCategorie = ref({ nom: "" });
const editCategorie = ref(null);
const errorMessage = ref("");

// Charger toutes les catégories au montage du composant
const fetchCategories = async () => {
  console.log("Début fetchCategories...");
  try {
    const response = await categorieService.getAllCategories();
    console.log("Réponse brute de l'API:", response);
    categories.value = response; // On assigne directement la réponse car c'est déjà un tableau
    console.log("Categories après assignation:", categories.value);
  } catch (error) {
    console.error("Erreur détaillée:", error);
    errorMessage.value = "Erreur lors du chargement des catégories.";
    console.error(error);
  }
};

// Ajouter une catégorie
const addCategorie = async () => {
  console.log("Tentative d'ajout de catégorie:", newCategorie.value);
  if (!newCategorie.value.nom) return;
  try {
    const response = await categorieService.createCategorie(newCategorie.value);
    console.log("Réponse de création:", response);
    categories.value.push(response.categorie); // On accède directement à response.categorie
    newCategorie.value.nom = "";
  } catch (error) {
    console.error("Erreur lors de l'ajout:", error);
    errorMessage.value = "Erreur lors de l'ajout de la catégorie.";
    console.error(error);
  }
};

// Mettre à jour une catégorie
const updateCategorie = async () => {
  if (!editCategorie.value) return;
  try {
    await categorieService.updateCategorie(editCategorie.value.id, editCategorie.value);
    categories.value = categories.value.map(cat =>
      cat.id === editCategorie.value.id ? { ...editCategorie.value } : cat
    );
    editCategorie.value = null;
  } catch (error) {
    errorMessage.value = "Erreur lors de la mise à jour de la catégorie.";
    console.error(error);
  }
};

// Supprimer une catégorie
const deleteCategorie = async (categorie) => {
  try {
    await categorieService.deleteCategorie(categorie.id);
    categories.value = categories.value.filter(cat => cat.id !== categorie.id);
  } catch (error) {
    errorMessage.value = "Erreur lors de la suppression de la catégorie.";
    console.error(error);
  }
};

onMounted(() => {
  console.log("Composant Categorie monté");
  fetchCategories();
});
</script>

<template>
  <div>
    <h1>Catégories</h1>

    <div class="add-form">
      <input v-model="newCategorie.nom" placeholder="Nom de la catégorie" />
      <button @click="addCategorie">Ajouter</button>
    </div>

    <ul>
      <li v-for="categorie in categories" :key="categorie.id">
        {{ categorie.nom }}
        <button @click="editCategorie = { ...categorie }">Éditer</button>
        <button @click="deleteCategorie(categorie)">Supprimer</button>
      </li>
    </ul>

    <div v-if="editCategorie" class="edit-form">
      <h2>Édition de la catégorie</h2>
      <div>
        <label for="nom">Nom</label>
        <input id="nom" v-model="editCategorie.nom" placeholder="Nom" />
      </div>
      <div>
        <label for="slug">Slug</label>
        <input id="slug" v-model="editCategorie.slug" placeholder="Slug" />
      </div>
      <div class="edit-actions">
        <button @click="updateCategorie">Mettre à jour</button>
        <button @click="editCategorie = null">Annuler</button>
      </div>
    </div>

    <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
  </div>
</template>
