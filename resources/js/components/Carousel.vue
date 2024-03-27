<template>
  <div class="flex flex-col items-center justify-center min-h-screen">
    <!-- Filters--->
    <div class="mb-4">
      <input
        type="text"
        v-model="nameFilter"
        placeholder="Filter by name"
        @input="fetchCarousel"
        class="input text-base p-2 border border-gray-300 rounded-lg mr-2"
      />
      <input
        type="number"
        v-model="discountFilter"
        placeholder="Filter by discount"
        @input="fetchCarousel"
        class="input text-base p-2 border border-gray-300 rounded-lg"
      />
    </div>

    <!-- Carousel Slider -->
    <div class=" max-w-[400px] max-h-[400px] mx-auto min-h-[400px]">
    <Splide :options="{ rewind: true, width: '100%', gap: '1rem' }">
      <SplideSlide
        v-for="carousel in filteredCarousel"
        :key="carousel.id"
        class=""
      >
        <div class="relative group">
          <img
            :src="carousel.image"
            alt="carousel.name"
            class="w-[400px] h-[400px] object-cover rounded-lg"
          />
          <div
            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4 rounded-lg"
          >
            <h3 class="text-white text-xl font-bold">{{ carousel.name }}</h3>
            <p class="text-white text-lg">
              Discount: {{ carousel.discount_percentage }}%
            </p>
          </div>
          <div
            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-25 rounded-lg transition duration-300 ease-in-out"
          ></div>
        </div>
      </SplideSlide>
    </Splide>
    </div>
  </div>
</template>

<script>
import { ref, watchEffect } from "vue";
import { Splide, SplideSlide } from "@splidejs/vue-splide";

export default {
  name: "Carousel",
  components: {
    Splide,
    SplideSlide,
  },
  setup() {
    const carousels = ref([]);
    const nameFilter = ref("");
    const discountFilter = ref(0);
    const filteredCarousel = ref([]);

    const fetchCarousel = async () => {
      try {
        const response = await fetch("/api/carousel");
        const data = await response.json();
        carousels.value = data;
      } catch (error) {
        console.error("Error fetching caruosel:", error);
      }
    };

    watchEffect(() => {
      filteredCarousel.value = carousels.value.filter((carousel) => {
        return (
          carousel.name
            .toLowerCase()
            .includes(nameFilter.value.toLowerCase()) &&
          carousel.discount_percentage >= discountFilter.value
        );
      });
    });

    fetchCarousel();

    return { nameFilter, discountFilter, filteredCarousel };
  },
};
</script>

<style>
@import "@splidejs/splide/dist/css/splide.min.css";
</style>
