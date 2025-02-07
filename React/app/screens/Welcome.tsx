/**
 * Écran d'accueil de l'application
 * Affiche le splash screen avec le logo et le message de bienvenue
 */

import React, { useEffect, useRef } from 'react';
import {
  View,
  Text,
  StyleSheet,
  Animated,
  TouchableOpacity,
  SafeAreaView,
  StatusBar,
} from 'react-native';

const COLORS = {
  background: '#FFFAF0', // Fond crème pour un effet chaleureux
  primary: '#D2691E', // Marron clair pour rappeler la cuisson
  secondary: '#FF8C00', // Orange feu
  text: '#5A3E1B', // Marron foncé pour le texte
  textSecondary: '#A0522D', // Marron plus clair
  inputBackground: '#FFF5E1', // Beige clair pour les champs de saisie
};

interface Props {
  onGetStarted: () => void;
}

const Welcome: React.FC<Props> = ({ onGetStarted }) => {
  // Références pour les animations
  const translateY = useRef(new Animated.Value(0)).current; // Animation verticale
  const rotate = useRef(new Animated.Value(0)).current; // Animation de rotation

  useEffect(() => {
    // Animation de montée/descente
    Animated.loop(
      Animated.sequence([
        Animated.timing(translateY, {
          toValue: -10, // Monte de 10 pixels
          duration: 500, // Durée de la montée
          useNativeDriver: true,
        }),
        Animated.timing(translateY, {
          toValue: 10, // Descend de 10 pixels
          duration: 500, // Durée de la descente
          useNativeDriver: true,
        }),
      ])
    ).start();

    // Animation de rotation
    Animated.loop(
      Animated.timing(rotate, {
        toValue: 1, // Rotation complète
        duration: 2000, // Durée de la rotation
        useNativeDriver: true,
      })
    ).start();
  }, [translateY, rotate]);

  // Interpolation pour la rotation (convertit la valeur en degrés)
  const rotateInterpolate = rotate.interpolate({
    inputRange: [0, 1],
    outputRange: ['-5deg', '5deg'], // Oscille entre -5° et 5°
  });

  return (
    <SafeAreaView style={styles.container}>
      <StatusBar barStyle="light-content" backgroundColor={COLORS.darkOrange} />
      <View style={styles.content}>
        {/* Image animée */}
        <Animated.Image
          source={require('../../sary/Feu.png')}
          style={[
            styles.image,
            {
              transform: [
                { translateY }, // Applique l'animation verticale
                { rotate: rotateInterpolate }, // Applique l'animation de rotation
              ],
            },
          ]}
          resizeMode="contain"
        />
        <Text style={styles.subtitle}>N'hésitez pas à commander</Text>
        <Text style={styles.subtitle}>vos plats chez nous</Text>

        <Text style={styles.title}>It's Cooking Time!</Text>

        <TouchableOpacity
          style={styles.button}
          onPress={onGetStarted}
        >
          <Text style={styles.buttonText}>Commencer</Text>
        </TouchableOpacity>
      </View>
    </SafeAreaView>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: COLORS.background,
  },
  content: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
    paddingHorizontal: 20,
  },
  image: {
    width: 200,
    height: 200,
    marginBottom: 40,
  },
  title: {
    fontSize: 32,
    fontWeight: 'bold',
    marginTop: 20,
    marginBottom: 40,
    color: COLORS.text,
  },
  subtitle: {
    fontSize: 16,
    color: COLORS.text,
    textAlign: 'center',
  },
  button: {
    backgroundColor: COLORS.primary,
    paddingHorizontal: 40,
    paddingVertical: 15,
    borderRadius: 25,
    elevation: 3,
    shadowColor: '#000',
    shadowOffset: {
      width: 0,
      height: 2,
    },
    shadowOpacity: 0.25,
    shadowRadius: 3.84,
  },
  buttonText: {
    color: COLORS.lightText,
    fontSize: 18,
    fontWeight: 'bold',
  },
});

export default Welcome;
