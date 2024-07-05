<template>
  <div v-if="cocktail">
    <h2>{{ cocktail.strDrink }}</h2>
    <img :src="cocktail.strDrinkThumb" alt="Cocktail Image" width="120" height="120"/>
    <p>{{ cocktail.strInstructions }}</p>
  </div>
</template>
  
  <script setup>
import { ref, watch, defineProps } from "vue";
import axios from "axios";

const props = defineProps({
  cocktailId: String,
});

const cocktail = ref(null);

const fetchCocktailDetail = async () => {
    try {
    const response = await axios.get(
      `https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=${props.cocktailId}`,
      console.log(`https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=${props.cocktailId}`),
    );
    cocktail.value = response.data.drinks[0];
  } catch (error) {
    console.error("Error fetching cocktail detail:", error);
  }
}

watch(() => props.cocktailId, fetchCocktailDetail);
</script>
  