<template>
  <nav class="navbar">
    <ul>
      <li><router-link to="/" class="nav-link">Accueil</router-link></li>
      <li><router-link to="/categorie" class="nav-link">Categorie</router-link></li>
      <li><router-link to="#" class="nav-link">Ingredient</router-link></li>
      <li><router-link to="/plat" class="nav-link">Plat</router-link></li>
      <li><router-link to="#" class="nav-link">Plat_Ingredient</router-link></li>
      <li><router-link to="#" class="nav-link">Commande</router-link></li>
      <li><router-link to="#" class="nav-link">Plat_Commande</router-link></li>
      <li><router-link to="#" class="nav-link">Stock</router-link></li>
      <li><router-link to="#" class="nav-link">Vente</router-link></li>
    </ul>
  </nav>
</template>

<style scoped>
/* Style pour la barre de navigation */
.navbar {
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(240, 240, 240, 0.9)); /* Dégradé léger et doux */
  padding: 10px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  width: 100%;
}

/* Liste des éléments de navigation */
ul {
  display: flex;
  gap: 15px;
  list-style: none;
  padding: 0;
  margin: 0;
  justify-content: center; /* Centrer les éléments horizontalement */
}

/* Style des liens de navigation */
.nav-link {
  color: #333; /* Couleur noire pour les liens */
  text-decoration: none;
  font-family: 'Arial', sans-serif; /* Police simple et épurée */
  font-size: 14px; /* Taille plus petite */
  padding: 5px 10px;
  border-radius: 3px;
  transition: color 0.3s ease;
}

/* Effet au survol des liens */
.nav-link:hover {
  color: #555; /* Légère modification de la couleur au survol */
}

/* Liens de navigation active */
.router-link-active {
  color: #222; /* Lien actif légèrement plus sombre */
}

/* Ajustement pour mobile */
@media (max-width: 768px) {
  ul {
    flex-direction: column;
    align-items: center;
  }
}
</style>
