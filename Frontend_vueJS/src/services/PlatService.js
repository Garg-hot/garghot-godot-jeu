import axios from 'axios';

const API_URL = 'http://172.20.10.3:8000/api/plat';

const platService = {
  /**
   * Récupère tous les plats
   */
  getAllPlats() {
    return axios.get(`${API_URL}/`)
      .then(response => response.data)
      .catch(error => {
        console.error('Erreur lors de la récupération des plats:', error);
        throw error;
      });
  },

  /**
   * Récupère un plat par son ID
   * @param {number} id 
   */
  getPlatById(id) {
    return axios.get(`${API_URL}/${id}`)
      .then(response => response.data)
      .catch(error => {
        console.error(`Erreur lors de la récupération du plat ID ${id}:`, error);
        throw error;
      });
  },

  /**
   * Ajoute un nouveau plat
   * @param {Object} platData 
   */
  createPlat(platData) {
    return axios.post(`${API_URL}/`, platData)
      .then(response => response.data)
      .catch(error => {
        console.error('Erreur lors de la création du plat:', error);
        throw error;
      });
  },

  /**
   * Met à jour un plat
   * @param {number} id 
   * @param {Object} platData 
   */
  updatePlat(id, platData) {
    console.log('URL de mise à jour:', `${API_URL}/edit/${id}`);
    console.log('Données envoyées:', platData);
    return axios.put(`${API_URL}/edit/${id}`, platData)
      .then(response => {
        console.log('Réponse brute de l\'API:', response);
        return response.data;
      })
      .catch(error => {
        console.error(`Erreur lors de la mise à jour du plat ID ${id}:`, error);
        console.error('Détails de l\'erreur:', error.response?.data);
        throw error;
      });
  },

  /**
   * Supprime un plat par ID
   * @param {number} id 
   */
  deletePlat(id) {
    return axios.delete(`${API_URL}/delete/${id}`)
      .then(response => response.data)
      .catch(error => {
        console.error(`Erreur lors de la suppression du plat ID ${id}:`, error);
        throw error;
      });
  }
};

export default platService;
