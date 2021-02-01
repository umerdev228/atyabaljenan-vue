<template>
  <div v-if="result" class="col-lg-12 col-md-12 col-12 p-0 w-100 " style="overflow: hidden scroll; background-color: rgb(244, 245, 245); min-height: calc(100% - 60px); height: calc(100% - 60px);">
    <div class="p-0 h-100">
      <div class="w-100 h-100 mb-5" style="min-height: 484px;">
        <div class="border-bottom  w-35 detail_header" style="top: 0; background-image: none; background-color: white; z-index: 1000;">
          <button v-on:click="$router.go(-1)" class="MuiButtonBase-root MuiButton-root MuiButton-text back_arrow mt-1" tabindex="0" type="button" style="float: left; height: 50px; max-width: 30px; margin-left: 10px; margin-right: 0px; display: inline-block; z-index: 22;">
            <span class="MuiButton-label"><svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"></path>
            </svg>
            </span>
            <span class="MuiTouchRipple-root"></span>
          </button>
          <button class="MuiButtonBase-root MuiButton-root MuiButton-text back_arrow mt-1 languageMakeDisappearForLargeScreen" tabindex="0" type="button" style="float: right; height: 50px; margin-right: 10px; margin-left: 0; font-size: 20px; padding-bottom: 15px; color: black; display: inline; z-index: 22;">
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
        <div v-if="product.media.length > 0" class="mt-5" style="margin-top: 100px !important;">
          <div class="sc-AxheI eJXbOf"></div>
          <div class="sc-AxhUy elBAeu" style="transform: translateX(0px);">
            <div class="sc-AxiKw eSuMax" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); transform-origin: 0 0 0;">
              <img class="preventDrag" :src="product.media[0].path">
            </div>
          </div>
        </div>
      </div>
      <div class="border-top border-bottom" style="height: 60px; line-height: 60px; vertical-align: middle;">
        <span class="text-muted cut-text-one-line-product-name  ml-4 text-left" style="direction: ltr; width: 97%;">
          <h1>{{ product.name }}</h1>
        </span>
      </div>
      <div class="border-top border-bottom mb-4 e" style="background-color: white; height: 60px; line-height: 30px; vertical-align: middle; margin-top: 0px;">
        <p class="text-muted mt-3 float-left ml-4" style="line-height: 2;">
          Price
        </p>
        <div class="mt-3 float-right " style="width: 150px; height: 30px;">
          <span class="float-right mr-4" style="color: green; direction: ltr; white-space: nowrap;">
            {{ product.price }}
          </span>
        </div>
      </div>
      <div class="border-top border-bottom" style="background-color: white; height: 60px; line-height: 30px; vertical-align: middle; margin-top: 0;">
        <p class="text-muted mt-3 float-left ml-4" style="line-height: 2;">
          Quantity
        </p>
        <div class="mt-3 float-right mr-4" style="width: 150px; height: 30px;">
          <svg v-on:click="decrementItem()" class="MuiSvgIcon-root quantity_button float-left" focusable="false" viewBox="0 0 24 24" aria-hidden="true" style="color: rgb(0, 153, 204);">
            <path d="M7 11v2h10v-2H7zm5-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path>
          </svg>
          <span class="mt-2" style="font-size: 15px;">
            {{ quantity }}
          </span>
          <svg v-on:click="incrementItem()" class="MuiSvgIcon-root quantity_button float-right" focusable="false" viewBox="0 0 24 24" aria-hidden="true" style="color: rgb(0, 153, 204);">
            <path d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4V7zm-1-5C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path>
          </svg>
        </div>
      </div>

      <div v-if="product.variant_head" class="mt-4 border " style="background-color: white;">
        <div class="mx-3 my-4 text-left" id="variant" style="direction: ltr;">
          <p style="margin: 10px 0;">
            <br>
          </p>
          <h3>
            {{ product.variant_head.name }}
          </h3>
          <div v-for="variant in product.variant_head.variants" class="form-group float" style="position: relative; padding-top: 8px; display: flex; flex-direction: column;">
            <label class="form-check-label align-left float" :for="'variant-'+variant.id">{{ variant.name }} ({{variant.price}})</label>
            <input v-on:click="selectVariant(variant)" class="form-check-input float-right" type="checkbox" name="variant" :id="'variant-'+variant.id">
          </div>
        </div>
      </div>

      <div v-if="product.addons_head" class="mt-4 border " style="background-color: white;">
        <div v-for="addon_head in product.addons_head" class="mx-3 my-4 text-left" id="addons" style="direction: ltr;">
          <p style="margin: 10px 0;">
            <br>
          </p>
          <h3>
            {{ addon_head.name }}
          </h3>
          <div v-for="addon in addon_head.addons" class="form-group float" style="position: relative; padding-top: 8px; display: flex; flex-direction: column;">
            <label class="form-check-label align-left float" :for="'addon-'+addon.id">{{ addon.name }} ({{addon.price}})</label>
            <input v-on:click="selectAddon(addon)" class="form-check-input float-right" type="checkbox" name="addons" :id="'addon-'+addon.id">
          </div>
        </div>
      </div>
      <div class="mt-4 border " style="background-color: white;">
        <div class="mx-3 my-4 text-left" id="description" style="direction: ltr;">
          <p style="margin: 10px 0;">
            <br>
          </p>
          <p>
            <strong>
              Description
            </strong>
          </p>
          <p>
            {{ product.description }}
          </p>
        </div>
      </div>
      <div class="border mt-4 pt-3" style="background-color: white; height: 90px; padding-bottom: 80px;">
        <p class="text-muted float-left ml-4">
          Special Requests
        </p>
        <div class="MuiFormControl-root MuiTextField-root MuiFormControl-fullWidth" style="width: 90%;">
          <div class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-fullWidth MuiInput-fullWidth MuiInputBase-formControl MuiInput-formControl" dir="ltr">
            <input name="instruction" v-model="instruction" type="text" class="MuiInputBase-input MuiInput-input">
          </div>
        </div>
      </div>
      <div class="free-space-50"></div>

      <div class="action-button-english" style="background-color: white; padding-bottom: 8px; margin-bottom: 0; height: 60px; z-index: 4;">
        <button v-on:click="addToCart()" class="MuiButtonBase-root MuiButton-root MuiButton-contained mb-1  ml-1 mx-auto MuiButton-containedPrimary" tabindex="0" type="button" dir="ltr" style="width: 97%; height: 100%; box-shadow: none; text-transform: none;">
          <span class="MuiButton-label">
            <span style="font-size: 1rem;">
              Add to Cart
            </span>
            <span class="px-2" style="position: absolute; right: 10px; top: 6px; padding-left: 2px; line-height: 34px; background: rgba(0, 0, 0, 0.3); border-radius: 7px; min-width: 32px; height: 32px; font-size: 0.8rem;">
              {{ $parent.price }}
            </span>
          </span>
          <span class="MuiTouchRipple-root"></span>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from 'vue';
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
// optional style for arrows & dots
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'


export default {
  components: { VueSlickCarousel },
  name: "detailComponent",
  data() {
    return {
      quantity: 1,
      c1Setting: {
        arrows: false,
        dots: false,
        asNavFor: this.$refs.c2,
        focusOnSelect: true,
        slidesToShow:3,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              initialSlide: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      },
      c2Setting: {
        arrows: false,
        dots: true,
        asNavFor: this.$refs.c1,
        focusOnSelect: true,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              initialSlide: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      },
      product: [],
      totalAmount: 0.00,
      cart: [],
      selectedAddons: [],
      selectedVariants: [],
      result: false,
      instruction: '',
    }
  },
  mounted() {
    this.$parent.loading = true
    this.product = [];
    this.getProduct();
    this.getCartItems();
  },
  methods: {
    onBeforeChangeC1(currentPosition, nextPosition) {
      this.$refs.c1.goTo(nextPosition)
    },
    onBeforeChangeC2(currentPosition, nextPosition) {
      this.$refs.c2.goTo(nextPosition)
    },
    getProduct() {
      let self = this
      let id = self.$route.params.id
      axios.post(APP_URL+'/api/getProduct', {
        'id': id
      })
        .then(response => {
          if (response.data.type === 'success') {
            self.product = response.data.product
            self.result = true
            console.log(self.product.media.length)
            this.$parent.loading = false
            this.$parent.price = response.data.price
            if(response.data.cart !== null) {
              self.quantity = response.data.cart.quantity
            }
          }
        })
        .catch(e => {
          this.errors.push(e)
        })
    },
    addToCart() {
      let self = this
      let totalPrice = 0.00
      totalPrice += parseInt(self.product.price)
      self.selectedVariants.forEach(function (variant) {
        totalPrice += parseInt(variant.price)
      })
      self.selectedAddons.forEach(function (addon) {
        totalPrice += parseInt(addon.price)
      })

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
          this.storeCart()
       }
      }
      else {
        this.storeCart()
      }

    },
    getTotalAmount() {
      let self = this
      this.cart.forEach(function (x) {
        self.totalAmount += x.price * x.quantity
      })
    },
    storeCart() {
      let self = this
      axios.post(APP_URL+'/store-cart', {
        'product': self.product,
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
    incrementItem() {
      if(this.product.stock > this.quantity) {
        this.quantity += 1
        Vue.toasted.success('Quantity Incremented Successfully');
      }
      else {
        Vue.toasted.error('Only ' + this.product.stock + ' available.');
      }
    },
    decrementItem() {
      if (this.quantity > 1) {
        this.quantity -= 1
        Vue.toasted.show('Quantity decremented Successfully');
      }
    },
    selectAddon(data) {
      let self = this
      if (self.selectedAddons.find(x => x.id === data.id)) {
        let i = self.selectedAddons.findIndex(x => x.id === data.id)
        self.selectedAddons.splice(i, 1);
        Vue.toasted.success('Addon Removed Successfully');
      }
      else {
        this.selectedAddons.push(data)
        Vue.toasted.success('Addon Added Successfully');
      }
    },
    selectVariant(data) {
      let self = this
      if (self.selectedVariants.find(x => x.id === data.id)) {
        let i = self.selectedVariants.findIndex(x => x.id === data.id)
        self.selectedVariants.splice(i, 1);
        Vue.toasted.success('Addon Removed Successfully');
      }
      else {
        this.selectedVariants.push(data)
        Vue.toasted.success('Addon Added Successfully');
      }
    },
    getCartItems() {
      let self = this
      axios.post(APP_URL+'/get-store-cart', {
        'product': self.$route.params.id,
      })
          .then(response => {
            if (response.data.type === 'success') {
              console.log(response.data)
            }
            else {
              console.log(response.data)
            }
          })
          .catch(e => {
            this.errors.push(e)
          })
    },
  },

}
</script>

<style>

.qty .count {
  color: #212020;
  display: inline-block;
  vertical-align: top;
  font-size: 14px;
  font-weight: 700;
  line-height: 30px;
  padding: 0 2px;
  min-width: 35px;
  text-align: center;
}
.qty .plus {
  cursor: pointer;
  display: inline-table;
  vertical-align: top;
  color: red;
  border: 2px solid red;
  width: 30px;
  height: 30px;
  font: 30px/1 Arial,sans-serif;
  text-align: center;
  border-radius: 50%;
}
.qty .minus {
  cursor: pointer;
  display: inline-table;
  vertical-align: top;
  color: red;
  width: 30px;
  height: 30px;
  font: 30px/1 Arial,sans-serif;
  text-align: center;
  border-radius: 50%;
  border: 2px solid red;
  background-clip: padding-box;
}
div {
  text-align: center;
}
.minus:hover{
  background-color: #717fe0 !important;
}
.plus:hover{
  background-color: #717fe0 !important;
}
/*Prevent text selection*/
span{
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
}
input{
  border: 0;
  width: 2%;
}
nput::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
input:disabled{
  background-color:white;
}
.slick-prev:before, .slick-next:before {
  color: #bd93f9 !important;
}

</style>