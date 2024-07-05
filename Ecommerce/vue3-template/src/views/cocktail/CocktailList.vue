<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-4">
        <div>
          <h1>Cocktail List</h1>
          <ul>
            <li
              v-for="cocktail in cocktails"
              :key="cocktail.idDrink"
              @click="selectCocktail(cocktail.idDrink)"
            >
              {{ cocktail.strDrink }}
              <br />
              <img
                :src="cocktail.strDrinkThumb"
                width="60"
                height="60"
                alt=""
              />
            </li>
          </ul>
        </div>
      </div>
      <div class="col">
        <CocktailDetail
          v-if="selectedCocktail"
          :cocktailId="selectedCocktail"
        />
      </div>
    </div>
  </div>
</template>
  
  <script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import CocktailDetail from "./CocktailDetail.vue";

const cocktails = ref([]);
const selectedCocktail = ref(null);

const fetchCocktails = async () => {
  try {
    const response = await axios.get(
      "https://www.thecocktaildb.com/api/json/v1/1/filter.php?c=Cocktail"
    );
    cocktails.value = response.data.drinks;
    console.log(cocktails.value);
  } catch (error) {
    console.error("Error fetching cocktails:", error);
  }
};

const selectCocktail = (id) => {
  selectedCocktail.value = id;
  console.log("Selected Cocktail ID:", selectedCocktail.value);
};

onMounted(fetchCocktails);
</script>
  