import axios from 'axios';

const API_URL = 'http://172.20.10.3:8000/api/categorie';

const categorieService = {
  /**
   * Récupère toutes les catégories
   */
  getAllCategories() {
    return axios.get(`${API_URL}/`)
      .then(response => response.data)
      .catch(error => {
        console.error('Erreur lors de la récupération des catégories:', error);
        throw error;
      });
  },

  /**
   * Récupère une catégorie par son ID
   * @param {number} id 
   */
  getCategorieById(id) {
    return axios.get(`${API_URL}/${id}`)
      .then(response => response.data)
      .catch(error => {
        console.error(`Erreur lors de la récupération de la catégorie ID ${id}:`, error);
        throw error;
      });
  },

  /**
   * Ajoute une nouvelle catégorie
   * @param {Object} categorie 
   */
  createCategorie(categorie) {
    return axios.post(`${API_URL}/`, categorie)
      .then(response => response.data)
      .catch(error => {
        console.error('Erreur lors de la création de la catégorie:', error);
        throw error;
      });
  },

  /**
   * Met à jour une catégorie
   * @param {number} id 
   * @param {Object} categorie 
   */
  updateCategorie(id, categorie) {
    return axios.put(`${API_URL}/edit/${id}`, categorie)
      .then(response => response.data)
      .catch(error => {
        console.error(`Erreur lors de la mise à jour de la catégorie ID ${id}:`, error);
        throw error;
      });
  },

  /**
   * Supprime une catégorie par ID
   * @param {number} id 
   */
  deleteCategorie(id) {
    return axios.delete(`${API_URL}/delete/${id}`)
      .then(response => response.data)
      .catch(error => {
        console.error(`Erreur lors de la suppression de la catégorie ID ${id}:`, error);
        throw error;
      });
  }
};

export default categorieService;
