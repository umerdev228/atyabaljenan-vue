<template>
  <div class="col-sm-12 ltr-product-details">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-ltr">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-ltr-header">
          <ul class="products-ltr-header-item">
            <li class="ltr-header-item" style="margin:0px auto;">
              <a class="mode-pickup" href="/">
                <h2 style="color: #2bb680">ATYAB ALJENAN</h2>
              </a>
            </li>
            <li class="ltr-header-item">
              <h2>Area</h2>
              <router-link :to="{name: 'AreasList'}" class="nav-item nav-link">
                <a v-if="area === null" style="color: #2bb680" class="mode-pickup">
                  Select Area
                  <i>
                    <svg width="1em" height="1em" viewBox="0 0 24 24">
                      <g fill="none" fill-rule="evenodd">
                        <path d="M3 3h18v18H3z"></path>
                        <path d="M3 3h18v18H3z"></path>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M9 18l6-6-6-6"></path>
                      </g>
                    </svg>
                  </i>
                </a>
                <a v-else style="color: #2bb680" class="mode-pickup">
                  {{ area.name }}
                  <i>
                    <svg width="1em" height="1em" viewBox="0 0 24 24">
                      <g fill="none" fill-rule="evenodd">
                        <path d="M3 3h18v18H3z"></path>
                        <path d="M3 3h18v18H3z"></path>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M9 18l6-6-6-6"></path>
                      </g>
                    </svg>
                  </i>
                </a>
              </router-link>
            </li>
          </ul>
          <a class="search-item">
            <div class="search-product">
              <input type="text" placeholder="Search" autofocus="" autocomplete="off">
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6" v-for="category in categories">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-img"></div>
        <router-link :to="{name: 'CategoryDetails', params: { id: category.id }}" class="nav-item nav-link">
          <item-container :category="category" :key="category.id"></item-container>
        </router-link>
      </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-footer">
      <div class="footer-title powered_by_message">Powered By<a target="_blank" class="tryrydalink" href="https://www.instagram.com/tryryda/">Try Ryda</a></div>
    </div>
    <div style="background:transparent;" class="col-xl-4 text-center col-lg-4 col-md-12 col-sm-12 col-12 product-oder-btn">
      <a href="http://atyabaljenan-vue.test/client/selectarea?path=http://atyabaljenan-vue.test">
        <a style="background-color: #2bb680" type="button" class="order-btn">
          <span class="item-content">Start Order</span>
        </a>
      </a>
    </div>
  </div>
</template>

<script>

export default {
  name: "itemSideComponent",
  data() {
    return {
      categories: [],
      area: null
    }
  },
  created() {
  },
  mounted() {
    this.getAllCategories()
    this.getSelectedArea()
  },
  methods: {
    getAllCategories() {
      let self = this
      axios.get(APP_URL+'/api/getAllCategories')
          .then(response => {
            if (response.data.type === 'success') {
              console.log(response.data)
              self.categories = response.data.categories
            }
          })
          .catch(e => {
            this.errors.push(e)
          })
    },
    getSelectedArea() {
      let self = this
      this.area = JSON.parse(localStorage.getItem('selected-area'))
      console.log(this.area, ' hello ')
    }
  }
}
</script>

<style scoped>

</style>