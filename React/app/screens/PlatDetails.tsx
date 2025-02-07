import React, { useState, useEffect } from 'react';
import {
  View,
  Text,
  StyleSheet,
  TouchableOpacity,
  SafeAreaView,
  Image,
  ScrollView,
  Alert,
} from 'react-native';
import { Ionicons } from '@expo/vector-icons';
import { collection, query, where, getDocs } from 'firebase/firestore';
import { FIREBASE_DB } from '../../FirebaseCongig';

interface Props {
  platId: string;
  platNom: string;
  prix: number;
  onBack: () => void;
}

const getImageForPlat = (platNom: string) => {
  const normalizedName = platNom.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');
  let imageSource = require('../../sary/Pizza.png');
  
  switch (normalizedName) {
    case 'poulet roti':
      imageSource = require('../../sary/Chicken.png');
      break;
    case 'pizza margherita':
      imageSource = require('../../sary/Pizza.png');
      break;
    case 'sandwich':
      imageSource = require('../../sary/Sandwich.png');
      break;
    case 'soupe chinoise':
      imageSource = require('../../sary/Pate.png');
      break;
    case 'fromage':
      imageSource = require('../../sary/Fromage.png');
      break;
    case 'pates':
    case 'pâtes':
      imageSource = require('../../sary/Pate.png');
      break;
  }
  return imageSource;
};

interface Ingredient {
  id: string;
  nom: string;
  quantite: number;
}

const PlatDetails: React.FC<Props> = ({ platId, platNom, prix, onBack }) => {
  const [ingredients, setIngredients] = useState<Ingredient[]>([]);
  const [isLoading, setIsLoading] = useState(true);

  useEffect(() => {
    loadIngredients();
  }, [platId]);

  const loadIngredients = async () => {
    try {
      const ingredientsSnapshot = await getDocs(collection(FIREBASE_DB, 'ingredients'));
      const platIngredientsRef = collection(FIREBASE_DB, 'plat_ingredients');
      const q = query(platIngredientsRef, where('id_plats', '==', Number(platId)));
      const querySnapshot = await getDocs(q);

      const ingredientsPromises = querySnapshot.docs.map(async (doc) => {
        const platIngredient = doc.data();
        const ingredientId = String(platIngredient.id_ingredient);
        const ingredient = ingredientsSnapshot.docs.find(ingDoc => ingDoc.id === ingredientId);
        
        if (ingredient) {
          const ingredientData = ingredient.data();
          return {
            id: ingredient.id,
            nom: ingredientData.nom,
            quantite: Number(platIngredient.quantite)
          };
        }
        return null;
      });

      const ingredientsData = (await Promise.all(ingredientsPromises)).filter(
        (ingredient): ingredient is Ingredient => ingredient !== null
      );

      setIngredients(ingredientsData);
    } catch (error) {
      console.error('Erreur lors du chargement des ingrédients:', error);
      Alert.alert('Erreur', 'Impossible de charger les ingrédients');
    } finally {
      setIsLoading(false);
    }
  };

  return (
    <SafeAreaView style={styles.container}>
      <View style={styles.header}>
        <TouchableOpacity 
          style={styles.backButton} 
          onPress={onBack}
        >
          <Ionicons name="arrow-back" size={24} color="#000" />
        </TouchableOpacity>
      </View>

      <ScrollView style={styles.content}>
        <View style={styles.imageContainer}>
          <Image
            source={getImageForPlat(platNom)}
            style={styles.image}
            resizeMode="cover"
          />
        </View>

        <View style={styles.detailsContainer}>
          <View style={styles.titleRow}>
            <Text style={styles.platName}>{platNom}</Text>
            <Text style={styles.platPrice}>{prix.toFixed(2)} €</Text>
          </View>

          <View style={styles.ingredientsSection}>
            <Text style={styles.sectionTitle}>Ingrédients</Text>
            <View style={styles.ingredientsList}>
              {ingredients.map((ingredient) => (
                <View key={ingredient.id} style={styles.ingredientItem}>
                  <Ionicons name="checkmark-circle" size={20} color="#2ecc71" style={styles.checkIcon} />
                  <Text style={styles.ingredientText}>
                    {ingredient.nom} ({ingredient.quantite})
                  </Text>
                </View>
              ))}
            </View>
          </View>
        </View>
      </ScrollView>
    </SafeAreaView>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
  },
  header: {
    padding: 15,
    flexDirection: 'row',
    alignItems: 'center',
    borderBottomWidth: 1,
    borderBottomColor: '#f0f0f0',
  },
  backButton: {
    padding: 5,
  },
  content: {
    flex: 1,
  },
  imageContainer: {
    width: '100%',
    height: 300,
    backgroundColor: '#f8f8f8',
    marginBottom: 20,
  },
  image: {
    width: '100%',
    height: '100%',
  },
  detailsContainer: {
    padding: 20,
  },
  titleRow: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
    marginBottom: 25,
  },
  platName: {
    fontSize: 28,
    fontWeight: 'bold',
    color: '#000',
  },
  platPrice: {
    fontSize: 24,
    fontWeight: '600',
    color: '#2ecc71',
  },
  ingredientsSection: {
    marginTop: 10,
  },
  sectionTitle: {
    fontSize: 20,
    fontWeight: '600',
    color: '#000',
    marginBottom: 15,
  },
  ingredientsList: {
    backgroundColor: '#fff',
    borderRadius: 12,
    padding: 5,
  },
  ingredientItem: {
    flexDirection: 'row',
    alignItems: 'center',
    paddingVertical: 12,
    paddingHorizontal: 10,
    borderBottomWidth: 1,
    borderBottomColor: '#f0f0f0',
  },
  checkIcon: {
    marginRight: 10,
  },
  ingredientText: {
    fontSize: 16,
    color: '#333',
  },
});

export default PlatDetails;
