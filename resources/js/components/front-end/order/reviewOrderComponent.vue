<template>
  <div class="row">
    <nav class="order-header">
      <button type="button" class="btn btn-block btn-back">
        <a @click="$router.go(-1)">
          <i>
            <svg width="1em" height="1em" viewBox="0 0 32 32">
              <path fill="currentColor" fill-rule="evenodd" d="M10.414 17l4.293 4.293a1 1 0 01-1.414 1.414l-6-6a1 1 0 010-1.414l6-6a1 1 0 111.414 1.414L10.414 15H24a1 1 0 010 2H10.414z"></path>
            </svg>
          </i>
        </a>
      </button>
    </nav>
    <div class="product-container-main" id="product-container" style="width: 100%">
      <div class="container-fluid">
        <ul class="delivery-review">
          <h4>Delivery Info</h4>
          <li class="delivery-time">
            <a>
              <span>{{ $parent.selectedArea.delivery_time }} Minutes from Now</span>
              <i>
                <svg width="1em" height="1em" viewBox="0 0 32 32">
                  <g fill="none" fill-rule="evenodd">
                    <path d="M4 4h24v24H4z"></path>
                    <path d="M4 4h24v24H4z"></path>
                    <path stroke="#4A4A4A" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M13 22l6-6-6-6"></path>
                  </g>
                </svg>
              </i>
            </a>
          </li>
        </ul>
        <ul class="delivery-review">
          <h3>Order Items</h3>
          <li class="delivery-time" v-for="item in cart">
            <div class="row review-row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price">
                <span class="price1 float-left"> {{ item.name }} </span>
                <span class="price2 float-right">{{item.price}}</span>
                <a href="#">
<!--                  <i class="fa fa-times"></i>-->
                </a>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon increase-item">
                <div class="add-remove-btn">
<!--                  <button type="button" class="btn-minus">-->
<!--                    <i>-->
<!--                      <svg width="1em" height="1em" viewBox="0 0 44 44">-->
<!--                        <path d="M32 22c0 2.761-.976 5.118-2.929 7.071C27.118 31.024 24.761 32 22 32s-5.118-.976-7.071-2.929C12.976 27.118 12 24.761 12 22s.976-5.118 2.929-7.071C16.882 12.976 19.239 12 22 12s5.118.976 7.071 2.929C31.024 16.882 32 19.239 32 22zm-14 0h8"-->
<!--                              fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"></path></svg>-->
<!--                    </i>-->
<!--                  </button>-->
                  <span class="float-right">({{ item.quantity }})</span>
<!--                  <button type="button" class="btn-plus">-->
<!--                    <i>-->
<!--                      <svg width="1em" height="1em" viewBox="0 0 44 44">-->
<!--                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"-->
<!--                              d="M32 22c0 2.761-.976 5.118-2.929 7.071C27.118 31.024 24.761 32 22 32s-5.118-.976-7.071-2.929C12.976 27.118 12 24.761 12 22s.976-5.118 2.929-7.071C16.882 12.976 19.239 12 22 12s5.118.976 7.071 2.929C31.024 16.882 32 19.239 32 22zm-10-4v8m-4-4h8"></path>-->
<!--                      </svg>-->
<!--                    </i>-->
<!--                  </button>-->
                </div>
<!--                <button class="product-price-btn">{{ item.quantity * item.price}}</button>-->
              </div>
            </div>
          </li>
        </ul>
<!--        <ul class="delivery-review">-->
<!--          <h3>Promo Code</h3>-->
<!--          <li class="delivery-time">-->
<!--            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">-->
<!--              <input type="text" placeholder=" " required="" name="promo_code" id="notes" class="additional-info promo-code">-->
<!--              <label for="notes" class="add-instruction">Enter Code</label>-->
<!--              <button type="button" class="btn-promo">Apply</button>-->
<!--            </div>-->
<!--          </li>-->
<!--        </ul>-->
        <ul class="delivery-review">
          <li class="delivery-time">
            <div class="row review-row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price">
                <span class="price3">Sub Total</span>
                <span class="price4 subtotal"> {{ $parent.price }} </span>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price">
                <span class="price3">Delivery Charges</span>
                <span class="price4 delivery_charges" data-charges="2"> {{ $parent.selectedArea.delivery_charges }}</span>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price price-total">
                <h3>Total</h3>
                <span class="price2 grand-total"> {{ $parent.price }}</span>
              </div>
            </div>
          </li>

        </ul>

      </div>
      <input type="hidden" class="currency_symbol" value="">
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-footer">
      <div class="footer-title powered_by_message">
        Powered By
        <a target="_blank" class="tryrydalink" href="https://www.instagram.com/tryryda/">
          Try Ryda
        </a>
      </div>
    </div>
    <div style="background:transparent;" class="col-xl-4 text-center col-lg-4 col-md-12 col-sm-12 col-12 product-oder-btn">
      <router-link :to="{name: 'ContactInfo'}" class="nav-item nav-link">
        <button class="order-btn">
          <span class="item-content">Go to Checkout</span>
        </button>
      </router-link>
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

  },
}
</script>
<style src="vue-tel-input/dist/vue-tel-input.css"></style>

<style>

</style>