<template>
  <div>
    <a href="javascript:void(0)">
      <div class="cat-inner">
        <div class="cat-image">
          <img :src="category.image">
        </div>
        <div class="cat-text">
          {{ category.category }}
        </div>
      </div>
    </a>
  </div>
</template>

<script>
export default {
  name: "mainGridContainerComponent",
  props: {
    category: Object,
  },
  data() {
    return {

    }
  },
  created() {
  },
  mounted() {
  },
  methods: {

  }
}
</script>

<style scoped>

</style>