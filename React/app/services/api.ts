import axios from 'axios';

export interface Plat {
  id: string;
  nom: string;
  prix: number;
  description?: string;
  image?: string;
}

export interface PanierItem {
  id: string;
  platId: string;
  userId: string;
  quantite: number;
  nom: string;
  prix: number;
}

export interface Commande {
  id: string;
  userId: string;
  items: PanierItem[];
  total: number;
  date: string;
  status: 'en_attente' | 'confirmee' | 'en_preparation' | 'livree';
}

const API_URL = 'https://api.example.com'; // Remplacez par votre URL d'API

export const api = {
  // Plats
  getPlats: async (): Promise<Plat[]> => {
    try {
      const response = await axios.get(`${API_URL}/plats`);
      return response.data;
    } catch (error) {
      console.error('Erreur lors de la récupération des plats:', error);
      throw error;
    }
  },

  getPlatById: async (id: string): Promise<Plat> => {
    try {
      const response = await axios.get(`${API_URL}/plats/${id}`);
      return response.data;
    } catch (error) {
      console.error(`Erreur lors de la récupération du plat ${id}:`, error);
      throw error;
    }
  },

  // Panier
  getPanier: async (userId: string): Promise<PanierItem[]> => {
    try {
      const response = await axios.get(`${API_URL}/panier/${userId}`);
      return response.data;
    } catch (error) {
      console.error('Erreur lors de la récupération du panier:', error);
      throw error;
    }
  },

  ajouterAuPanier: async (userId: string, item: Omit<PanierItem, 'id'>): Promise<PanierItem> => {
    try {
      const response = await axios.post(`${API_URL}/panier/${userId}`, item);
      return response.data;
    } catch (error) {
      console.error('Erreur lors de l\'ajout au panier:', error);
      throw error;
    }
  },

  updateQuantitePanier: async (userId: string, itemId: string, quantite: number): Promise<PanierItem> => {
    try {
      const response = await axios.put(`${API_URL}/panier/${userId}/items/${itemId}`, { quantite });
      return response.data;
    } catch (error) {
      console.error('Erreur lors de la mise à jour de la quantité:', error);
      throw error;
    }
  },

  supprimerDuPanier: async (userId: string, itemId: string): Promise<void> => {
    try {
      await axios.delete(`${API_URL}/panier/${userId}/items/${itemId}`);
    } catch (error) {
      console.error('Erreur lors de la suppression du panier:', error);
      throw error;
    }
  },

  viderPanier: async (userId: string): Promise<void> => {
    try {
      await axios.delete(`${API_URL}/panier/${userId}`);
    } catch (error) {
      console.error('Erreur lors de la suppression du panier:', error);
      throw error;
    }
  },

  // Commandes
  getCommandes: async (userId: string): Promise<Commande[]> => {
    try {
      const response = await axios.get(`${API_URL}/commandes/${userId}`);
      return response.data;
    } catch (error) {
      console.error('Erreur lors de la récupération des commandes:', error);
      throw error;
    }
  },

  creerCommande: async (userId: string, items: PanierItem[]): Promise<Commande> => {
    try {
      const total = items.reduce((sum, item) => sum + (item.prix * item.quantite), 0);
      const commande = {
        userId,
        items,
        total,
        date: new Date().toISOString(),
        status: 'en_attente' as const
      };
      
      const response = await axios.post(`${API_URL}/commandes`, commande);
      return response.data;
    } catch (error) {
      console.error('Erreur lors de la création de la commande:', error);
      throw error;
    }
  }
};
