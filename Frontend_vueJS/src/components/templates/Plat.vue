<script setup>
import { ref, onMounted } from "vue";
import platService from "../../services/PlatService";
import categorieService from "../../services/CategorieService";

const plats = ref([]);
const categories = ref([]);
const newPlat = ref({ nom: "", description: "", duration: null, categorie: "" });
const editPlat = ref(null);
const errorMessage = ref("");

// Charger les plats et les catégories au montage
const fetchPlats = async () => {
  console.log("Fetching plats...");
  try {
    const response = await platService.getAllPlats();
    plats.value = response;
    console.log("Plats chargés:", plats.value);
  } catch (error) {
    console.error("Erreur lors du chargement des plats:", error);
    errorMessage.value = "Erreur lors du chargement des plats.";
  }
};

const fetchCategories = async () => {
  console.log("Fetching categories...");
  try {
    categories.value = await categorieService.getAllCategories();
    console.log("Catégories chargées:", categories.value);
  } catch (error) {
    console.error("Erreur lors du chargement des catégories:", error);
    errorMessage.value = "Erreur lors du chargement des catégories.";
  }
};


const addPlat = async () => {
  console.log("Tentative d'ajout du plat:", newPlat.value);
  if (!newPlat.value.nom || !newPlat.value.categorie) {
    console.warn("Nom et catégorie sont requis");
    return;
  }
  console.log(newPlat);
  try {
    const selectedCategory = categories.value.find(cat => cat.id === newPlat.value.categorie);
    if (!selectedCategory) {
      console.error("Catégorie non trouvée");
      return;
    }

    // Construire l'objet `categorie` attendu par l'API avec uniquement le nom
    const platToSend = {
      nom: newPlat.value.nom,
      description: newPlat.value.description,
      duration: newPlat.value.duration,
      categorie: {
        nom: selectedCategory.nom // Envoyer uniquement le nom de la catégorie
      }
    };

    const plat = await platService.createPlat(platToSend);
    console.log("Plat ajouté avec succès:", plat);
    plats.value.push(plat);
    newPlat.value = { nom: "", description: "", duration: null, categorie: "" }; // Réinitialisation
  } catch (error) {
    console.error("Erreur lors de l'ajout du plat:", error);
    errorMessage.value = "Erreur lors de l'ajout du plat.";
  }
};


// Mettre à jour un plat
const updatePlat = async () => {
  console.log("Tentative de mise à jour du plat:", editPlat.value);
  if (!editPlat.value) {
    console.warn("Aucun plat sélectionné pour mise à jour");
    return;
  }
  try {
    // Trouver la catégorie sélectionnée pour obtenir son nom
    const selectedCategory = categories.value.find(cat => cat.id === editPlat.value.categorie);
    if (!selectedCategory) {
      console.error("Catégorie non trouvée");
      return;
    }

    // Construire l'objet avec le format attendu par l'API
    const platToUpdate = {
      nom: editPlat.value.nom,
      description: editPlat.value.description,
      duration: editPlat.value.duration,
      categorie: {
        nom: selectedCategory.nom // Envoyer uniquement le nom de la catégorie
      }
    };

    console.log("Données envoyées à l'API:", platToUpdate);
    const response = await platService.updatePlat(editPlat.value.id, platToUpdate);
    console.log("Réponse de l'API après mise à jour:", response);
    
    // Mettre à jour la liste locale
    const updatedPlat = await platService.getPlatById(editPlat.value.id);
    plats.value = plats.value.map(p => (p.id === editPlat.value.id ? updatedPlat : p));
    console.log("Plat mis à jour avec succès:", updatedPlat);
    editPlat.value = null;
  } catch (error) {
    console.error("Erreur lors de la mise à jour du plat:", error);
    errorMessage.value = "Erreur lors de la mise à jour du plat.";
  }
};

// Supprimer un plat
const deletePlat = async (plat) => {
  console.log("Tentative de suppression du plat:", plat);
  try {
    await platService.deletePlat(plat.id);
    plats.value = plats.value.filter(p => p.id !== plat.id);
    console.log("Plat supprimé avec succès:", plat);
  } catch (error) {
    console.error("Erreur lors de la suppression du plat:", error);
    errorMessage.value = "Erreur lors de la suppression du plat.";
  }
};

onMounted(() => {
  console.log("Montage du composant...");
  fetchPlats();
  fetchCategories();
});
</script>

<template>
  <div>
    <h1>Plats</h1>

    <div class="add-form">
      <input v-model="newPlat.nom" placeholder="Nom du plat" />
      <br>
      <textarea v-model="newPlat.description" placeholder="Description"></textarea>
      <br>
      <input v-model="newPlat.duration" type="number" placeholder="Durée (min)" />
      <br>
      <select v-model="newPlat.categorie" required>
        <option value="" disabled selected>-- Sélectionnez une catégorie --</option>
        <option v-for="cat in categories" :key="cat.id" :value="cat.id">
          {{ cat.nom }}
        </option>
      </select>
      <br>
      <button @click="addPlat">Ajouter</button>
    </div>

    <ul>
      <li v-for="plat in plats" :key="plat.id">
        <strong>{{ plat.nom }}</strong> - {{ plat.description }} - Durée ({{ plat.duration }} min) - {{ plat.categorie?.nom }}
        <button @click="() => {
          const categorieId = plat.categorie?.id;
          editPlat = {
            ...plat,
            categorie: categorieId // Utiliser l'ID de la catégorie pour le select
          };
          console.log('Édition du plat avec catégorie:', categorieId);
        }">Éditer</button>
        <button @click="() => deletePlat(plat)">Supprimer</button>
      </li>
    </ul>

    <div v-if="editPlat" class="edit-form">
      <h2>Édition du plat</h2>
      <div>
        <label for="nom">Nom</label>
        <input id="nom" v-model="editPlat.nom" placeholder="Nom" required />
      </div>
      <div>
        <label for="description">Description</label>
        <textarea id="description" v-model="editPlat.description" required></textarea>
      </div>
      <div>
        <label for="duration">Durée (min)</label>
        <input id="duration" type="number" v-model="editPlat.duration" required />
      </div>
      <div>
        <label for="categorie">Catégorie</label>
        <select id="categorie" v-model="editPlat.categorie" required>
          <option value="" disabled>-- Sélectionnez une catégorie --</option>
          <option v-for="cat in categories" :key="cat.id" :value="cat.id">
            {{ cat.nom }}
          </option>
        </select>
      </div>
      <div class="edit-actions">
        <button @click="updatePlat">Mettre à jour</button>
        <button @click="() => { editPlat = null; }">Annuler</button>
      </div>
    </div>

    <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
  </div>
</template>
