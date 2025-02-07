<script setup>
import { ref, onMounted } from "vue";
import categorieService from '../../services/categorieService';

const categories = ref([]);
const newCategorie = ref({ nom: "" });
const errorMessage = ref("");
const editCategorie = ref(null);

const fetchCategories = async () => {
    try {
        categories.value = await categorieService.getAllCategories();
    } catch (error) {
        errorMessage.value = "Erreur lors du chargement des catégories.";
    }
};

const addCategorie = async () => {
    try {
        if (!newCategorie.value.nom.trim()) {
            errorMessage.value = "Le nom de la catégorie ne peut pas être vide.";
            return;
        }

        await categorieService.createCategorie(newCategorie.value);
        newCategorie.value.nom = ""; // Réinitialiser l'input après ajout
        await fetchCategories(); // Mettre à jour la liste après ajout
    } catch (error) {
        errorMessage.value = "Erreur lors de l'ajout de la catégorie.";
    }
};

// Fonction pour mettre à jour la catégorie
const updateCategorie = async (categorie) => {
    try {
        if (!categorie.nom.trim()) {
            errorMessage.value = "Le nom de la catégorie ne peut pas être vide.";
            return;
        }

        await categorieService.updateCategorie(categorie); // Appel API pour mettre à jour
        await fetchCategories(); // Mettre à jour la liste des catégories
        editCategorie.value = null; // Réinitialiser l'édition après la mise à jour
    } catch (error) {
      console.error("Erreur lors de la mise à jour de la catégorie :", error); // Afficher l'erreur dans la console
      errorMessage.value = "Erreur lors de la mise à jour de la catégorie.";
    }
};
const deleteCategorie = async (categorieId) => {
    try {
        await categorieService.deleteCategorie(categorieId); // Appel API pour supprimer
        await fetchCategories(); // Mettre à jour la liste des catégories
    } catch (error) {
      console.error("Erreur lors de la suppression de la catégorie :", error); // Afficher l'erreur dans la console
      errorMessage.value = "Erreur lors de la suppression de la catégorie.";
    }
}
// Charger les catégories au montage du composant
onMounted(fetchCategories);
</script>

<template>
  <div>
    <h1>Catégories</h1>

    <input v-model="newCategorie.nom" placeholder="Nom de la catégorie" />
    <button @click="addCategorie">Ajouter</button>

    <ul>
      <li v-for="categorie in categories" :key="categorie.id">
        {{ categorie.nom }}
        <button @click="editCategorie = { ...categorie }">Éditer</button>
        <button @click="deleteCategorie(categorie.id)">Supprimer</button>
      </li>
    </ul>

    <div v-if="editCategorie">
      <h2>Édition de la catégorie</h2>
      <label for="Nom">Nom</label>
      <input v-model="editCategorie.nom" placeholder="Nom" />
      <br>
      <label for="Slug">Slug</label>
      <input v-model="editCategorie.slug" placeholder="Slug" />
      <br>
      <button @click="updateCategorie(editCategorie)">Mettre à jour</button>
      <button @click="editCategorie = null">Annuler</button>
    </div>

    <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
  </div>
</template>

<style>
.error {
  color: red;
  font-weight: bold;
}
</style>
