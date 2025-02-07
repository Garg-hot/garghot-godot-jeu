<template>
  <div id="app">
    <!-- Navbar avec les liens de navigation -->
    <Navbar />
    
    <!-- Ici, le contenu des pages sera injecté en fonction de la route -->
    <router-view></router-view>
  </div>
</template>

<script setup>
// Importation des composants nécessaires
import Navbar from './components/organisms/Navbar.vue';
</script>

<style>
/* Réinitialisation des marges et des paddings */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Corps de la page avec un fond pastel */
body {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  background-color: #f9f1f8; /* Fond rose pastel */
  color: #333; /* Couleur de texte sombre pour la lisibilité */
  line-height: 1.6;
  padding: 20px;
  font-size: 16px;
}

/* Styles du container principal */
#app {
  text-align: center;
  background: linear-gradient(135deg, rgba(255, 179, 222, 0.7), rgba(173, 216, 230, 0.7)); /* Dégradé de couleurs pastel (rose et bleu) */
  border-radius: 10px;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
  padding: 20px;
}

/* Style pour les titres */
h1 {
  font-size: 2rem;
  color: #6c5b7b; /* Couleur gris-mauve pour un effet subtil */
  margin-bottom: 20px;
}

/* Boutons avec un style pixelisé */
button {
  padding: 12px 20px;
  background-color: #f7d680; /* Jaune pastel */
  color: #4b4b4b;
  border: 3px solid #f7d680;
  border-radius: 8px;
  cursor: pointer;
  font-family: 'Press Start 2P', cursive; /* Police de jeu pixelisé */
  transition: background-color 0.3s ease;
  font-size: 16px;
}

button:hover {
  background-color: #f9b34c; /* Jaune plus foncé au survol */
  border-color: #f9b34c;
}

/* Entrées de formulaire stylisées */
input {
  padding: 10px 14px;
  font-size: 1rem;
  margin: 10px 0;
  border: 2px solid #d1c9c0; /* Bordure de couleur gris clair */
  border-radius: 5px;
  width: 100%;
  max-width: 320px;
  background-color: #fff;
  font-family: 'Press Start 2P', cursive; /* Police pixelisée */
}

ul {
  list-style-type: none;
  padding: 0;
  margin-top: 20px;
}

li {
  margin-bottom: 12px;
  font-size: 1.2rem;
  font-family: 'Press Start 2P', cursive; /* Police pixelisée */
}

/* Messages d'erreur */
.error {
  color: red;
  font-weight: bold;
  margin-top: 15px;
  font-family: 'Press Start 2P', cursive;
}

/* Styles pour les éléments en pixel */
.pixel {
  font-family: 'Press Start 2P', cursive;
  font-size: 18px;
  text-align: center;
  color: #4b4b4b;
  background-color: #f1f1f1;
  padding: 8px;
  border-radius: 5px;
  margin: 5px;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  display: inline-block;
}
</style>

