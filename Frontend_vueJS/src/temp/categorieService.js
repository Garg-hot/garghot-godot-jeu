import axios from "axios";

const apiClient = axios.create({
  baseURL: "http://localhost:8000/api/categorie",
  headers: {
    "Content-Type": "application/json"
  }
});

export default {
    async getAllCategories() {
        try {
        const response = await apiClient.get("/");
        return response.data;
        } catch (error) {
        console.error("Erreur lors de la récupération des catégories :", error);
        throw error;
        }
    },

    async getCategoryById(id) {
        try {
        const response = await apiClient.get(`/${id}`);
        return response.data;
        } catch (error) {
        console.error(`Erreur lors de la récupération de la catégorie ID: ${id}`, error);
        throw error;
        }
    },

    async createCategorie(categorie) {
        try {
            const response = await apiClient.post("/", JSON.stringify(categorie), {
                headers: {
                    "Content-Type": "application/json"
                }
            });
            return response.data;
        } catch (error) {
            console.error("Erreur lors de l'ajout de la catégorie", error.response?.data || error);
            throw error;
        }
    },
    // Fonction pour mettre à jour une catégorie
    async updateCategorie(categorie) {
        try {
        const response = await apiClient.put(`/edit/${categorie.id}`, JSON.stringify(categorie), {
            headers: {
            "Content-Type": "application/json"
            }
        });
        return response.data;
        } catch (error) {
        console.error("Erreur lors de la mise à jour de la catégorie", error.response?.data || error);
        throw error;
        }
    },
    async deleteCategorie(id) {
        try {
            const response = await apiClient.delete(`/delete/${id}`);
            return response.data;
        } catch (error) {
            console.error(`Erreur lors de la suppression de la catégorie ID: ${id}`, error.response?.data || error);
            throw error;
        }
    }

};
