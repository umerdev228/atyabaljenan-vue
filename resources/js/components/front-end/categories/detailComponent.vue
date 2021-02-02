<template>
  <div class="col-lg-12 col-md-12 col-12 p-0 w-100 " style="overflow: hidden scroll; background-color: rgb(244, 245, 245); min-height: calc(100% - 60px); height: calc(100% - 60px);">
    <div class="p-0 h-100">
      <div class="" style="background-color: white; min-height: 682px;">
        <div class="border-bottom detail_header" style="top: 0; background-image: none; background-color: white; z-index: 1000;">
          <button v-on:click="$router.go(-1)" class="MuiButtonBase-root MuiButton-root MuiButton-text back_arrow mt-1" tabindex="0" type="button" style="float: left; height: 50px; max-width: 30px; margin-left: 10px; margin-right: 0px; display: inline-block; z-index: 22;">
            <span class="MuiButton-label">
              <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"></path>
              </svg>
            </span>
            <span class="MuiTouchRipple-root"></span>
          </button>
          <div class="row" style="position: absolute; width: 100%; left: 15px; top: 0px; display: inline-block; line-height: 3.2;">
            <div class="col text-center">
              <p style="font-weight: 600; font-size: 17px; max-width: 187px; margin-left: auto; margin-right: auto; max-height: 54px; line-height: 3; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                {{ category.category }}
              </p>
            </div>
          </div>
          <button class="MuiButtonBase-root MuiButton-root MuiButton-text back_arrow mt-1 languageMakeDisappearForLargeScreen" tabindex="0" type="button" style="float: right; height: 50px; margin-right: 10px; margin-left: 0px; font-size: 20px; padding-bottom: 15px; color: black; display: inline; z-index: 22;">
            <span class="MuiButton-label">ع</span>
            <span class="MuiTouchRipple-root"></span>
          </button>
          <button class="MuiButtonBase-root MuiButton-root MuiButton-text  mt-1 languageMakeDisappearForLargeScreen" tabindex="0" type="button" style="float: right; height: 50px; max-width: 30px; display: inline-block; z-index: 22;">
            <span class="MuiButton-label">
              <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true" style="color: black;">
                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
              </svg>
            </span>
            <span class="MuiTouchRipple-root"></span>
          </button>
        </div>
        <div style="height: auto; margin-top: 1px; background-color: white; border-bottom: 1px solid rgb(212, 213, 212);">
          <div class="row m-0 w-100" style="border-top: 1px solid rgb(222, 226, 230);">
            <div class="col-12">
              <div class="scrollable-div">
                <div class="row border-bottom bg-white disable-scroll-bar" style="min-height: 65px; direction: ltr;">
                  <div class="col-4 bg-white m-auto">
                    <button v-on:click="$router.push('/areas')" class="MuiButtonBase-root MuiButton-root" tabindex="0" type="button" style="line-height: 3; width: 80px; max-height: 40px; text-transform: none; font-weight: bold; box-shadow: none; border-radius: 3px; padding: 0px;">
                      <span class="MuiButton-label" v-if="$parent.selectedArea === null">Choose Delivery Area</span>
                      <span class="MuiButton-label" v-else>{{$parent.selectedArea.name}}</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <form class="MuiPaper-root jss21 MuiPaper-elevation1 MuiPaper-rounded" style="direction: ltr;">
            <div class="MuiInputBase-root jss22">
              <input v-model="search" placeholder="Search for products" type="text" aria-label="Search for products" class="MuiInputBase-input" value="">
            </div>
            <button class="MuiButtonBase-root MuiIconButton-root jss23" tabindex="0" type="submit" aria-label="search">
          <span class="MuiIconButton-label">
            <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
            </svg>
          </span>
              <span class="MuiTouchRipple-root"></span>
            </button>
          </form>

        </div>

        <div class="free-space-80" style="background-color: white;"></div>
        <div class="row mx-auto m-0" dir="ltr" style="background-color: white; width: 98%;">
          <div v-for="product in filteredProducts" class="col-6 mb-5" style="width: 50%; min-height: 240px; padding-right: 8px; padding-left: 8px;">
            <router-link :to="{name: 'ProductDetails', params: { id: product.id }}" class="nav-item nav-link">
            <a href="javascript:void(0)" style="color: black;">
              <div :style="{'background': 'url(' + product.media[0].path + ') center center / contain no-repeat', 'background-size': '100px', 'border-radius': '7px', 'width': '100%', 'display': 'block', 'cursor': 'pointer', 'min-height': '240px', 'position': 'relative'}">
<!--                <div style="background: rgba(255, 255, 255, 0.85); border-radius: 0px 0px 5px 5px; font-weight: bold; width: 100%; padding-top: 5px; height: 30px; bottom: 0px; position: absolute;">-->
<!--                  <svg id="Layer_1" x="0px" y="0px" viewBox="0 0 371.648 371.648" xml:space="preserve" class="mx-2" style="width: 15px; height: 15px;">-->
<!--                    <g>-->
<!--                      <g>-->
<!--                        <path d="M335.312,210.615c0-47.904-22.328-90.433-57.181-117.783l10.743-16.43l27.892,17.995c1.799,1.297,3.709,2.472,6.182,2.472 c1.237,0,1.448,0.014,3.715-0.994c3.011-1.865,4.94-3.952,6.177-6.424c17.308-27.199,9.891-63.054-17.309-80.364 c-12.364-8.655-28.436-11.127-43.273-7.418c-14.837,3.709-27.2,12.364-35.855,25.963c-3.709,6.182-2.473,13.6,3.709,17.309 l27.726,17.888l-10.627,16.252c-21.223-11.525-45.573-18.066-71.499-18.066c-25.553,0-49.574,6.361-70.58,17.579l-9.172-14.026 l26.589-17.154c6.182-3.709,7.418-11.128,3.709-17.309c-7.419-13.6-21.019-22.254-35.855-25.963 C85.567,0.433,70.73,2.906,57.13,11.56c-13.6,7.418-22.255,21.019-25.964,35.854s-1.237,29.672,7.418,43.273 c2.225,3.813,5.862,5.597,9.788,6.563c2.4,0.591,4.125,0.938,7.522-0.381L84.923,78.14l9.194,14.061 c-35.321,27.324-58.005,70.135-58.005,118.414c0,45.927,20.53,86.906,52.936,114.312l-17.281,27.718 c-3.516,5.734-1.805,13.225,3.842,16.88c0.074,0.048,0.147,0.095,0.221,0.143c5.84,3.77,13.636,1.992,17.269-3.935l16.393-26.271 c22.301,13.185,48.347,20.753,76.218,20.753c28.249,0,54.626-7.771,77.127-21.289l16.033,26.163 c3.601,5.875,11.311,7.68,17.142,4.008c0.078-0.049,0.156-0.098,0.233-0.147c5.733-3.616,7.503-11.163,3.961-16.942l-17.018-27.77 C315.128,296.836,335.312,256.157,335.312,210.615z M264.84,32.579c3.709-2.472,8.588-5.168,12.363-6.184 c10.294-2.77,18.913,1.288,26.447,6.056c12.184,7.711,17.18,21.049,13.117,33.509L264.84,32.579z M54.657,65.959 c-1.236-4.945-1.236-8.654,0-13.6c2.473-8.654,5.768-14.555,13.045-19.705c5.046-3.571,12.919-6.258,19.1-6.258 c2.473,0,4.179,0.198,7.538,0.885c5.075,1.037,8.535,2.825,12.244,5.297L54.657,65.959z M198.078,333.649v-8.052 c0-7.418-4.945-12.364-12.364-12.364c-7.418,0-12.364,4.945-12.364,12.364v8.052c-21.565-2.096-41.477-9.623-58.369-21.203 c-0.651-0.619-1.384-1.187-2.213-1.684c-0.239-0.143-0.483-0.266-0.725-0.394c-27.653-20.158-46.618-51.427-50.472-87.389h9.16 c6.182,0,12.364-4.945,12.364-12.364s-4.945-12.364-12.364-12.364h-9.398c0.006,0,0.867-7.417,0.971-8.097 c0.41-2.684,0.908-5.354,1.492-8.005c1.152-5.228,2.64-10.382,4.456-15.419c1.79-4.966,3.898-9.818,6.306-14.516 c2.386-4.655,5.067-9.159,8.02-13.477c2.938-4.296,6.146-8.407,9.599-12.302c3.447-3.889,7.137-7.562,11.041-10.99 c2.474-2.172,5.026-4.257,7.662-6.23c2.684-2.01,5.488-3.813,8.3-5.646c4.151-2.706,8.592-5.056,13.078-7.17 c5.447-2.567,11.08-4.737,16.842-6.487c5.869-1.783,11.87-3.129,17.937-4.029c2.097-0.311,4.203-0.569,6.313-0.775v9.289 c0,7.418,4.945,12.364,12.364,12.364c7.419,0,12.364-6.182,12.364-12.364V85.12c21.112,2.095,40.643,9.491,57.305,20.788 c0.308,0.255,0.667,0.499,1.06,0.732c29.843,20.686,50.245,53.969,53.635,91.612h-9.382c-7.418,0-12.364,4.945-12.364,12.364 c0,7.418,4.945,12.364,12.364,12.364h9.16C303.564,281.704,256.976,327.924,198.078,333.649z"></path>-->
<!--                      </g>-->
<!--                    </g>-->
<!--                    <g>-->
<!--                      <g>-->
<!--                        <path d="M254.949,198.25h-37.064c-3.605-8.911-10.898-16.204-19.809-19.81v-37.062c0-7.418-4.945-12.364-12.364-12.364 c-7.419,0-12.364,4.945-12.364,12.364v37.062c-12.784,5.173-22.255,17.94-22.255,32.173c0.001,18.546,14.838,34.619,34.62,34.619 c15.18,0,27.439-9.469,32.325-22.254h36.911c6.182,0,12.364-4.945,12.364-12.364C267.313,203.196,262.368,198.25,254.949,198.25z  M185.713,219.27c-4.945,0-9.891-4.945-9.891-9.892c0-4.947,3.709-9.892,9.891-9.892s9.891,4.945,9.891,9.892 C195.604,214.325,191.893,219.27,185.713,219.27z"></path>-->
<!--                      </g>-->
<!--                    </g>-->
<!--                  </svg>-->
<!--                  1.0 hour-->
<!--                </div>-->
              </div>
              <div>
                <p class="mt-2 mb-0 cut-text-one-line text-left pl-1" style="font-size: 14px; font-weight: bold; height: 20px;">
                  {{ product.name }}
                </p>
                <p class="cut-text-two-lines-grid-view text-left pl-1" style="font-size: 14px; color: rgb(51, 51, 51); margin-top: 3px; margin-bottom: 3px; height: 38px;">
                  {{product.description}}
                </p>
                <p class="mb-4 text-right pr-1 " dir="ltr" style="font-size: 14px;">
                <p class="text-right m-0" style="font-weight: bold;">
                Price on selection
              </p>
                <div class="mt-2  float-right">
                  <button v-on:click="addToCart(product)" class="MuiButtonBase-root MuiButton-root MuiButton-outlined mx-auto MuiButton-outlinedPrimary MuiButton-outlinedSizeSmall MuiButton-sizeSmall MuiButton-disableElevation" tabindex="0" type="button" style="height: 30px; width: 80px; font-weight: bold; border: 1px solid; text-transform: none; font-size: 14px;">
                    <span class="MuiButton-label">
                      <span class="MuiButton-startIcon MuiButton-iconSizeSmall">
                        <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                          <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                        </svg>
                      </span>
                      Add
                    </span>
                  </button>
                </div>
              </div>
            </a>
            </router-link>
          </div>
        </div>
        <div class="free-space-80" style="background-color: white;"></div>
        <div class="action-button-english" style="background-color: white; padding-bottom: 8px; margin-bottom: 0; height: 60px; z-index: 4;">
          <button v-on:click="$router.push('/order-review')" class="MuiButtonBase-root MuiButton-root MuiButton-contained mb-1  ml-1 mx-auto MuiButton-containedPrimary" tabindex="0" type="button" dir="ltr" :style="{'width': '97%', 'height': '100%', 'box-shadow': 'none', 'text-transform': 'none', 'background': $parent.settings.button_color}">
            <span class="MuiButton-label">
              <span class="px-1" style="position: absolute; left: 10px; top: 6px; line-height: 34px; background: rgba(0, 0, 0, 0.3); border-radius: 7px; min-width: 32px; height: 32px; font-size: 1rem;">
                {{ $parent.quantity }}
              </span>
              <span style="font-size: 1rem;">
                Review Order
              </span>
              <span style="position: absolute; right: 10px; top: 6px; line-height: 34px; border-radius: 7px; min-width: 32px; height: 32px; font-size: 1rem;">
                {{ $parent.price }}
              </span>
            </span>
            <span class="MuiTouchRipple-root"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from "vue";

export default {
  name: "detailComponent",
  data() {
    return {
      products: [],
      category: '',
      selectedVariants: '',
      instruction: '',
      quantity: '',
      search: '',
    }
  },
  created() {},
  mounted() {
    this.$parent.loading = true
    this.getProducts()
  },
  computed:{
    filteredProducts:function(){
      var self=this;
      return self.products.filter(function(val){
        return val.name.toLowerCase().includes(self.search.toLowerCase());
      })
    }
  },
  methods: {
    getProducts() {
      let self = this
      let id = self.$route.params.id
      console.log(id)
      axios.post(APP_URL+'/api/getProducts', {
        'id': id
      })
        .then(response => {
          if (response.data.type === 'success') {
            self.products = response.data.products
            self.category = response.data.category

            self.$parent.loading = false
          }
        })
        .catch(e => {
          this.errors.push(e)
        })
    },
    addToCart(product) {
      let self = this
      let totalPrice = 0.00
      totalPrice += parseInt(self.product.price)

      if (this.$parent.selectedArea === null) {
        this.$router.push('/areas')
        Vue.toasted.error('Choose Area To Deliver First');
        return
      }
      if (this.product.manage_stock) {
        if (this.product.stock < this.quantity) {
          Vue.toasted.error('Out of stock');
        }
        else {
          this.storeCart(product)
        }
      }
      else {
        this.storeCart(product)
      }

    },
    storeCart(product) {
      let self = this
      axios.post(APP_URL+'/store-cart', {
        'product': product,
        'addons': self.selectedAddons,
        'variants': self.selectedVariants,
        'instruction': self.instruction,
        'quantity': self.quantity,
      })
          .then(response => {
            if (response.data.type === 'success') {
              self.$parent.price = response.data.totalPrice
              self.getCartItems()
            }
          })
          .catch(e => {
            this.errors.push(e)
          })

    },
  },
}
</script>

<style scoped>

</style>