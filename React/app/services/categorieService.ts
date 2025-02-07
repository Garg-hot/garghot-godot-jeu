import axios from 'axios';
import { Alert } from 'react-native';

export interface Categorie {
  id: number;
  nom: string;
  slug?: string;
}

const API_URL = 'http://192.168.88.180:8000/api';

// Création d'une instance axios avec la configuration appropriée
const axiosInstance = axios.create({
  baseURL: API_URL,
  timeout: 10000,
  headers: {
    'Accept': 'application/json',
    'Content-Type': 'application/json'
  }
});

// Ajout d'un intercepteur pour gérer les erreurs
axiosInstance.interceptors.response.use(
  response => response,
  error => {
    console.error('Erreur Axios:', {
      message: error.message,
      config: error.config,
      response: error.response?.data
    });
    return Promise.reject(error);
  }
);

export const categorieService = {
  getAllCategories: async (): Promise<Categorie[]> => {
    try {
      Alert.alert('Debug', `Tentative de connexion à ${API_URL}/categorie`);

      const response = await axiosInstance.get(`${API_URL}/categorie`, {
        timeout: 5000,
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        }
      });

      Alert.alert('Succès', `Données reçues: ${JSON.stringify(response.data)}`);
      return Array.isArray(response.data) ? response.data : [];

    } catch (error: any) {
      const errorMessage = error.response
        ? `Erreur ${error.response.status}: ${JSON.stringify(error.response.data)}`
        : `Erreur réseau: ${error.message}`;

      Alert.alert('Erreur', errorMessage);

      // En cas d'erreur, retourner un tableau vide
      return [];
    }
  }
};
