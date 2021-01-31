<template>
  <div class="col-md-12 col-sm-12 col-12 ltr-product-details">
    <div class="row">
      <div class="product-container-main" id="product-container" style="width: 100%">
        <header class="review-header">
          <h1>Checkout</h1>
          <a @click="$router.go(-1)" class="btn-back">
            <a>
              <i>
                <svg width="1em" height="1em" viewBox="0 0 32 32">
                  <path fill="currentColor" fill-rule="evenodd"
                        d="M10.414 17l4.293 4.293a1 1 0 01-1.414 1.414l-6-6a1 1 0 010-1.414l6-6a1 1 0 111.414 1.414L10.414 15H24a1 1 0 010 2H10.414z"></path>
                </svg>
              </i>
            </a>
          </a>
        </header>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 steppers">
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 stepper0"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 stepper1"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 stepper1"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 stepper1"></div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 order-contact">
              <h1>Contact Information</h1>
              <p>We’ll use it to get back to you for order updates</p>
              <div class="row contact-row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
                  <input type="text" v-model="name" placeholder="Enter Name" required name="name" id="name" class="additional-info">
                  <label for="name" class="add-instruction">Name</label>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
                  <vue-phone-number-input
                      show-code-on-list
                      default-country-code="KW"
                      :preferred-countries="['KW']"
                      size="lg"
                      @update="resultsExample = $event"
                      v-model="phone" />
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
                  <input type="text" placeholder="Enter Email" required="" name="email" id="email" class="additional-info1">
                  <label v-model="email" for="email" class="add-instruction1">E-mail (Optional)</label>
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-order-address" style="min-height: 400px !important;">
              <nav>
                <label class="nav_title">Choose Unit Type</label>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link  type-link" data-type="House" id="nav-house-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                    <i>
                      <svg width="1em" height="1em" viewBox="0 0 35 35">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M8 15.786v12.198C8 28.544 8.455 29 9.016 29H15v-7.115h5V29h5.984c.56 0 1.016-.455 1.016-1.016V15.786M4 17.82L16.302 5.315a1.016 1.016 0 011.422-.027L31 17.82"></path>
                      </svg>
                    </i>
                    House
                  </a>
                  <a class="nav-item nav-link  type-link" id="nav-appartment-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                    <i>
                      <svg width="1em" height="1em" viewBox="0 0 35 35">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"
                              d="M5 29V6a1 1 0 011-1h23a1 1 0 011 1v23a1 1 0 01-1 1h-8v-8.333h-7V30H6a1 1 0 01-1-1zm6-18.5h1-1zm0 6h1-1zm6-6h1-1zm0 6h1-1zm6-6h1-1zm0 6h1-1z"></path>
                      </svg>
                    </i>
                    Apartment
                  </a>
                  <a class="nav-item nav-link  type-link" id="nav-office-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                    <i>
                      <svg width="1em" height="1em" viewBox="0 0 35 35">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"
                              d="M5 17.9V28a1 1 0 001 1h23a1 1 0 001-1V18m-10 1.88V19a1 1 0 00-1-1h-2a1 1 0 00-1 1v.957c-3.721-.214-7.528-1.22-11.42-3.017a1 1 0 01-.58-.907V11a1 1 0 011-1h25a1 1 0 011 1v5.033a1 1 0 01-.58.907c-3.544 1.637-7.017 2.617-10.42 2.94zM17 18h2a1 1 0 011 1v2a1 1 0 01-1 1h-2a1 1 0 01-1-1v-2a1 1 0 011-1zm-4-9V7a1 1 0 011-1h8a1 1 0 011 1v2a1 1 0 01-1 1h-8a1 1 0 01-1-1z"></path>
                      </svg>
                    </i>
                    Office
                  </a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent" style="min-height: 450px;">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
                    <input type="text" placeholder=" " value="" required="" name="block" id="block" class="additional-info house-block">
                    <label for="block" class="add-instruction">Block</label>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
                    <form>
                      <input id="street" placeholder=" " value="" required="" name="street" class="additional-info1 house-street">
                      <label for="street" class="add-instruction1">Street</label>
                    </form>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
                    <form>
                      <input id="avenue" placeholder=" " value="" required="" name="avenue" class="additional-info2 house-avanue">
                      <label for="avenue" class="add-instruction2">Avenue (Optional)</label>
                    </form>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
                    <form>
                      <input id="house" placeholder=" " value="" required="" name="house" class="additional-info3 house-house">
                      <label for="house" class="add-instruction3">House</label>
                    </form>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
                    <form>
                      <input id="direction" placeholder=" " value="" required="" name="direction" class="additional-info6 house-special-direction">
                      <label for="direction" class="add-instruction6">Special Direction (Optional)</label>
                    </form>
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
                    <input type="text" placeholder=" " value="" required="" name="block" id="block" class="additional-info apa-block">
                    <label for="block" class="add-instruction">Block</label>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
                    <form>
                      <input id="street" placeholder=" " value="" required="" name="street" class="additional-info1 apa-street">
                      <label for="street" class="add-instruction1">Street</label>
                    </form>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
                    <form>
                      <input id="avenue" placeholder=" " value="" required="" name="avenue" class="additional-info2 apa-avanue">
                      <label for="avenue" class="add-instruction2">Avenue (Optional)</label>
                    </form>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
                    <form>
                      <input id="building" placeholder=" " value="" required="" name="building" class="additional-info3 apa-building">
                      <label for="building" class="add-instruction3">Building</label>
                    </form>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
                    <form>
                      <input id="floor" placeholder=" " value="" required="" name="floor" class="additional-info4 apa-floor">
                      <label for="floor" class="add-instruction4">Floor</label>
                    </form>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
                    <form>
                      <input id="office" placeholder=" " value="" required="" name="office" class="additional-info5 apa-office-no">
                      <label for="office" class="add-instruction5">Office</label>
                    </form>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
                    <form>
                      <input id="direction" placeholder=" " value="" required="" name="direction" class="additional-info6 apa-special-direction">
                      <label for="direction" class="add-instruction6">Special Direction (Optional)</label>
                    </form>
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">
                    <input type="text" value="" placeholder=" " required="" name="block" id="block" class="additional-info office-block">
                    <label for="block" class="add-instruction ">Block</label>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                    <form>
                      <input id="street" placeholder=" " value="" required="" name="street" class="additional-info1 office-street">
                      <label for="street" class="add-instruction1">Street</label>
                    </form>

                  </div>

                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                    <form>
                      <input id="avenue" placeholder=" " value="" required="" name="avenue" class="additional-info2 office-avanue">
                      <label for="avenue" class="add-instruction2">Avenue (Optional)</label>
                    </form>

                  </div>

                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                    <form>
                      <input id="building" value="" placeholder=" " required="" name="building" class="additional-info3 office-building">
                      <label for="building" class="add-instruction3">Block</label>
                    </form>

                  </div>

                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                    <form>
                      <input id="floor" value="" placeholder=" " required="" name="floor" class="additional-info4 office-floor">
                      <label for="floor" class="add-instruction4">Floor</label>
                    </form>

                  </div>

                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                    <form>
                      <input id="office" value="" placeholder=" " required="" name="office" class="additional-info5 office-no">
                      <label for="office" class="add-instruction5">Office No</label>
                    </form>

                  </div>

                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 product-price optional-addon">

                    <form>
                      <input id="direction" placeholder=" " value="" required="" name="direction" class="additional-info6 office-special-direction">
                      <label for="direction" class="add-instruction6">Special Direction (Optional)</label>
                    </form>

                  </div>

                </div>
              </div>

            </div>

          </div>
        </div>
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
<!--        <router-link :to="{name: 'DeliveryInfo'}" class="nav-item nav-link">-->
          <a @click="createCustomer()" style="background-color: red">
            <button type="button" class="order-btn">
              <span class="item-content">Next</span>
            </button>
          </a>
<!--        </router-link>-->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "contactInfoComponent",
  data() {
    return{
      name: '',
      phone: '',
      email: '',
      resultsExample: null
    }
  },
  created() {
  },
  methods: {
    createCustomer() {
      let self = this
      let name = this.name
      let phone = this.resultsExample
      let email = this.email

      axios.post(APP_URL+'/api/createCustomer', {
        'name': name,
        'phone': phone,
        'email': email,
      })
        .then(response => {
          if (response.data.type === 'success') {
            console.log(response.data)
            self.$router.push('/delivery/info')
          }
        })
        .catch(e => {
          this.errors.push(e)
        })
    }
  }
}
</script>

<style scoped>

</style>