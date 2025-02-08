import axios from "axios";

const apiClient = axios.create({
  baseURL: "http://localhost:8000/api/plat",
  headers: {
    "Content-Type": "application/json"
  }
});

export default {
    async getAllPlats() {
        try {
        const response = await apiClient.get("/");
        return response.data;
        } catch (error) {
        console.error("Erreur lors de la récupération des plats :", error);
        throw error;
        }
    },

    async getPlatById(id) {
        try {
        const response = await apiClient.get(`/${id}`);
        return response.data;
        } catch (error) {
        console.error(`Erreur lors de la récupération du plat ID: ${id}`, error);
        throw error;
        }
    },

    async createPlat(plat) {
        try {
            const response = await apiClient.post("/", JSON.stringify(plat), {
                headers: {
                    "Content-Type": "application/json"
                }
            });
            return response.data;
        } catch (error) {
            console.error("Erreur lors de l'ajout du plat", error.response?.data || error);
            throw error;
        }
    },
    // // Fonction pour mettre à jour une catégorie
    // async updateCategorie(categorie) {
    //     try {
    //     const response = await apiClient.put(`/edit/${categorie.id}`, JSON.stringify(categorie), {
    //         headers: {
    //         "Content-Type": "application/json"
    //         }
    //     });
    //     return response.data;
    //     } catch (error) {
    //     console.error("Erreur lors de la mise à jour de la catégorie", error.response?.data || error);
    //     throw error;
    //     }
    // },
    // async deleteCategorie(id) {
    //     try {
    //         const response = await apiClient.delete(`/delete/${id}`);
    //         return response.data;
    //     } catch (error) {
    //         console.error(`Erreur lors de la suppression de la catégorie ID: ${id}`, error.response?.data || error);
    //         throw error;
    //     }
    // }

};
