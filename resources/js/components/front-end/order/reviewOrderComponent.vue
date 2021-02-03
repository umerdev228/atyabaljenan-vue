<template>
  <div class="col-lg-12 col-md-12 col-12 p-0 w-100 " style="overflow: hidden scroll; background-color: rgb(244, 245, 245); min-height: calc(100% - 60px); height: calc(100% - 60px);">
    <div class="p-0 h-100">
      <div class="noselect" style="background: white; min-height: 682px;">
      <div class="border-bottom  w-40 detail_header" style="top: 0px; background-image: none; background-color: white; z-index: 1000;">
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
              Shopping Cart
            </p>
          </div>
        </div>
        <button class="MuiButtonBase-root MuiButton-root MuiButton-text back_arrow mt-1 languageMakeDisappearForLargeScreen" style="float: right; height: 50px; margin-right: 10px; margin-left: 0; font-size: 20px; padding-bottom: 15px; color: black; display: inline; z-index: 22;">
          <span class="MuiButton-label">ع</span>
          <span class="MuiTouchRipple-root"></span>
        </button>
      </div>
      <div class="free-space-50"></div>
      <div>
        <ul class="MuiList-root MuiList-padding">

          <li v-for="product in cart" class="MuiListItem-root MuiListItem-gutters" style="border-bottom: 1px solid rgba(221, 238, 221, 0.933);">
            <div class="MuiGrid-root MuiGrid-container MuiGrid-spacing-xs-3">
              <div class="MuiGrid-root text-center MuiGrid-item MuiGrid-grid-xs-4 MuiGrid-grid-sm-3 MuiGrid-grid-lg-2" style="align-self: center;">
                <div style="position: relative;">
<!--                  <img height="70" src="https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/39/73/397378fd8b2361405c8099bb3e9a1ce4.jpg" style="border-radius: 5px; min-width: 70px; min-height: 70px; width: 70px; height: 70px;">-->
<!--                  <div class="MuiGrid-root mx-auto mt-1 MuiGrid-container MuiGrid-align-items-xs-center MuiGrid-justify-xs-space-around" style="width: 82px; background-color: white; height: 30px;">-->
<!--                    <div class="MuiGrid-root option-quantity-button MuiGrid-item">-->
<!--                      <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">-->
<!--                        <path d="M7 11v2h10v-2H7zm5-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path>-->
<!--                      </svg>-->
<!--                    </div>-->
<!--                    <div class="MuiGrid-root MuiGrid-item">-->
<!--                      <div class="text-center" style="border: 0.5px solid rgb(222, 222, 222); border-radius: 5px; width: 35px; padding: 1px;">1</div>-->
<!--                    </div>-->
<!--                    <div class="MuiGrid-root option-quantity-button MuiGrid-item">-->
<!--                      <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">-->
<!--                        <path d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4V7zm-1-5C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path>-->
<!--                    </svg>-->
<!--                    </div>-->
<!--                  </div>-->
                </div>
              </div>
              <div class="MuiGrid-root text-left MuiGrid-item MuiGrid-grid-xs-5 MuiGrid-grid-sm-6 MuiGrid-grid-md-7 MuiGrid-grid-lg-8" style="font-weight: 300;">
                <span style="font-weight: 600;">
                  {{ product.name }}
                </span>
                <div class="p-2">
                <div v-if="product.attributes.addons.length > 0" v-for="addon in product.attributes.addons" class="ml-2">
                  <p class="text-muted m-0 px-2" dir="ltr" style="font-size: 0.95rem;">
                    <span style="font-weight: 600;">Addon: </span>
                    <span>{{ addon.name }}</span>
                  </p>
                </div>
                </div>
                <div class="p-2">
                <div v-if="product.attributes.variants.length > 0" v-for="variant in product.attributes.variants" class="ml-2">
                  <p class="text-muted m-0 px-2" dir="ltr" style="font-size: 0.95rem;">
                    <span style="font-weight: 600;">Variant: </span>
                    <span>{{ variant.name }}</span>
                  </p>
                </div>
                </div>
              </div>
              <div class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-3 MuiGrid-grid-md-2">
                <div style="position: absolute; bottom: 10px; right: 14px; direction: rtl; text-align: right; font-size: 1rem; width: 100%; white-space: nowrap;">
                  {{ product.price }}
                </div>
                <svg v-on:click="removeCart(product)" class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true" style="position: absolute; color: red; width: 20px; right: 15px; top: 10px;">
                  <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path>
                </svg>
              </div>
            </div>
          </li>

        </ul>
        <div class="free-space-80" style="background-color: white;"></div>
        <div class="action-button-english" style="background-color: white; padding-bottom: 8px; margin-bottom: 0; height: 60px; z-index: 4;">
          <button v-on:click="$router.push('/contact/info')" class="MuiButtonBase-root MuiButton-root MuiButton-contained mb-1  ml-1 mx-auto MuiButton-containedPrimary" tabindex="0" type="button" dir="ltr" style="width: 97%; height: 100%; box-shadow: none; text-transform: none;">
            <span class="MuiButton-label">
              <span class="px-1" style="position: absolute; left: 10px; top: 6px; line-height: 34px; background: rgba(0, 0, 0, 0.3); border-radius: 7px; min-width: 32px; height: 32px; font-size: 1rem;">
<!--                3-->
              </span>
              <span style="font-size: 1rem;">
                Next
              </span>
              <span style="position: absolute; right: 10px; top: 6px; line-height: 34px; border-radius: 7px; min-width: 32px; height: 32px; font-size: 1rem;">
<!--                70.000 KD-->
              </span>
            </span>
            <span class="MuiTouchRipple-root"></span>
          </button>
        </div>
      </div>
    </div>
    </div>
  </div>
</template>

<script>
import Vue from "vue";

export default {
  name: "reviewOrderComponent",
  data() {
    return {
      quantity: 1,
      product: [],
      totalAmount: 0.00,
      cart: [],
      selectedAddons: [],
      selectedVariants: [],
    }
  },
  mounted() {
    this.$parent.loading = true
    this.cart = [];
    this.getCart()
  },
  methods: {
    getCart() {
      let self = this
      axios.get(APP_URL+'/get-all-cart')
        .then(response => {
          if (response.data.type === 'success') {
            console.log(response.data.cart)
            self.cart = response.data.cart
            this.$parent.loading = false
          }
        })
        .catch(e => {
          this.errors.push(e)
        })
    },
    removeCart(product) {
      let self = this
      axios.post(APP_URL+'/remove-cart', {
        'product': product.id
      })
          .then(response => {
            console.log(response.data)
            if (response.data.type === 'success') {
              self.cart = response.data.cart
            }
          })
          .catch(e => {
            this.errors.push(e)
          })
    }
  },
}
</script>
<style src="vue-tel-input/dist/vue-tel-input.css"></style>

<style>

</style>