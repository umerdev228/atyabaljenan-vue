<template>
  <div class="col-lg-12 col-md-12 col-12 p-0 w-100 " style="overflow: hidden scroll; background-color: rgb(244, 245, 245); min-height: calc(100% - 60px); height: calc(100% - 60px);">
    <div class="p-0 h-100">
      <div class="  w-100 mx-0 " style="background-color: white; height: 769px; min-height: 690px;">
        <div class="border-bottom  w-45 detail_header" style="top: 0px; background-image: none; background-color: white; z-index: 1000;">
          <button v-on:click="$router.go(-1)" class="MuiButtonBase-root MuiButton-root MuiButton-text back_arrow mt-1" tabindex="0" type="button" style="float: left; height: 50px; max-width: 30px; margin-left: 10px; margin-right: 0px; display: inline-block; z-index: 22;">
            <span class="MuiButton-label">
              <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"></path>
              </svg>
            </span>
            <span class="MuiTouchRipple-root"></span>
          </button>
          <button class="MuiButtonBase-root MuiButton-root MuiButton-text back_arrow mt-1 languageMakeDisappearForLargeScreen" tabindex="0" type="button" style="float: right; height: 50px; margin-right: 10px; margin-left: 0px; font-size: 20px; padding-bottom: 15px; color: black; display: inline; z-index: 22;">
            <span class="MuiButton-label">ع</span>
            <span class="MuiTouchRipple-root"></span>
          </button>
        </div>
        <div class="border-top w-100" style="margin-top: 55px; background-color: white;">
          <div class="row stepperWidth" style="position: fixed; top: 53px; height: 5px; background-color: white; margin-right: auto; margin-left: auto;">
            <div class="col mx-1 align-self-center" style="width: 30px; height: 2px; background-color: rgb(0, 153, 204);"></div>
            <div class="col mx-1 align-self-center" style="width: 30px; height: 2px; background-color: rgb(209, 206, 206);"></div>
          </div>
          <svg height="100" viewBox="0 -20 440.4 440" width="100" style="margin-top: 98px;">
            <path d="m440.398438 90.199219v290.859375c.003906 11.046875-8.953126 20.003906-20 20h-400.398438c-11.046875.003906-20.00390625-8.953125-20-20v-290.859375zm0 0" fill="#00efd1"></path>
            <path d="m440.398438 20.199219v70h-440.398438v-70c-.00390625-11.046875 8.953125-20.003907 20-20h400.398438c11.046874-.003907 20.003906 8.953125 20 20zm0 0" fill="#00acea"></path>
            <path d="m390.199219 29.171875h30v30h-30zm0 0" fill="#fedb41"></path>
            <path d="m338.199219 29.171875h30v30h-30zm0 0" fill="#fedb41"></path>
            <path d="m20.199219 29.171875h290v30h-290zm0 0" fill="#fedb41"></path>
            <path d="m169.410156 253.28125c9.964844 0 19.464844 4.21875 26.144532 11.613281 6.683593 7.394531 9.921874 17.269531 8.914062 27.183594v56.480469h-149.570312v-56.480469c-1.003907-9.914063 2.234374-19.792969 8.917968-27.1875s16.1875-11.613281 26.152344-11.609375h26.890625v.039062l4.78125 19.660157h-.519531l-7.019532 44.550781v.007812l15.589844 15 16.578125-15-8.070312-44.550781-16.558594-.007812h16.089844l4.789062-19.660157v-.039062zm0 0" fill="#00acea"></path>
            <path d="m162.429688 178.28125v26.207031c0 18.742188-15.191407 33.933594-33.929688 33.933594s-33.929688-15.191406-33.929688-33.933594v-25.648437c13.441407 2.238281 22.269532-4.589844 27.628907-12.410156h.011719c7.097656 10.410156 19.757812 20.628906 40.21875 11.851562zm0 0" fill="#f7caa5"></path>
            <path d="m162.429688 170.699219v7.582031c-20.460938 8.777344-33.121094-1.441406-40.21875-11.851562-3.273438-4.84375-5.816407-10.144532-7.539063-15.730469h27.757813c11.042968.003906 19.996093 8.957031 20 20zm0 0" fill="#4b5d63"></path>
            <path d="m138.199219 272.988281 8.070312 44.550781-16.578125 15-15.589844-15v-.007812l7.019532-44.550781h.519531zm0 0" fill="#fedb41"></path>
            <path d="m142.519531 253.28125v.039062l-4.789062 19.660157h-16.089844l-4.78125-19.660157v-.039062zm0 0" fill="#fedb41"></path>
            <path d="m122.210938 166.429688h-.011719c-5.359375 7.820312-14.1875 14.648437-27.628907 12.410156v-8.140625c.003907-11.042969 8.957032-19.996094 20-20h.101563c1.722656 5.585937 4.265625 10.886719 7.539063 15.730469zm0 0" fill="#4b5d63"></path>
            <g fill="#fedb41">
              <path d="m243.199219 195.628906h82c3.316406 0 6-2.683594 6-6 0-3.3125-2.683594-6-6-6h-82c-3.3125 0-6 2.6875-6 6 0 3.316406 2.6875 6 6 6zm0 0"></path>
              <path d="m243.199219 225.628906h142c3.316406 0 6-2.683594 6-6 0-3.3125-2.683594-6-6-6h-142c-3.3125 0-6 2.6875-6 6 0 3.316406 2.6875 6 6 6zm0 0"></path>
              <path d="m385.199219 243.628906h-142c-3.3125 0-6 2.6875-6 6 0 3.316406 2.6875 6 6 6h142c3.316406 0 6-2.683594 6-6 0-3.3125-2.683594-6-6-6zm0 0"></path>
              <path d="m385.199219 273.628906h-142c-3.3125 0-6 2.6875-6 6 0 3.316406 2.6875 6 6 6h142c3.316406 0 6-2.683594 6-6 0-3.3125-2.683594-6-6-6zm0 0"></path>
              <path d="m385.199219 303.628906h-142c-3.3125 0-6 2.6875-6 6 0 3.316406 2.6875 6 6 6h142c3.316406 0 6-2.683594 6-6 0-3.3125-2.683594-6-6-6zm0 0"></path>
            </g>
          </svg>
          <p class="text-muted mt-3 mb-0" style="font-size: 22px;">
            Contact Information
          </p>
          <p class="mx-auto w-75" style="font-size: 15px; color: rgb(194, 194, 194);">
            We need this information to contact you and get the order delivered
          </p>
          <div class="w-100 px-4">
            <form>
              <div class="MuiFormControl-root MuiTextField-root my-4 MuiFormControl-fullWidth">
                <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated" data-shrink="false" for="name" id="standard-basic-label" dir="ltr">
                  Name *
                </label>
                <div class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-fullWidth MuiInput-fullWidth MuiInputBase-formControl MuiInput-formControl" dir="ltr">
                  <input aria-invalid="false" id="name" name="name" v-model="name" type="text" class="MuiInputBase-input MuiInput-input" value="">
                </div>
              </div>
              <div class="MuiFormControl-root MuiTextField-root MuiFormControl-fullWidth">
                <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated" data-shrink="false" for="email" id="standard-basic-label" dir="ltr">
                  Email
                </label>
                <div class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-fullWidth MuiInput-fullWidth MuiInputBase-formControl MuiInput-formControl" dir="ltr">
                  <input aria-invalid="false" id="email" name="email" v-model="email" type="email" class="MuiInputBase-input MuiInput-input" value="">
                </div>
              </div>
              <div class="MuiFormControl-root MuiTextField-root mt-4 mb-3 MuiFormControl-fullWidth">
                <vue-phone-number-input
                    show-code-on-list
                    no-flags
                    size="lg"
                    v-model="phone"
                    @update="result = $event.formattedNumber"
                    default-country-code="KW"
                    default-country="KW"
                />
              </div>


              <div class="w-100 mr-3" style="margin-left: 0px;">
                <div class="row align-items-end mx-auto" dir="ltr" style="margin-top: 20px; width: 95%;">
                  <div class="col-6 mb-3">
                    <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-animated" id="demo-simple-select-label" style="text-align: left; display: inline-block; min-width: 153px; width: 100%;">
                      Country
                    </label>
                    <div class="MuiInputBase-root MuiInput-root MuiInput-underline" dir="ltr" style="width: 100%;">
                      <div class="MuiSelect-root pr-5 MuiSelect-select MuiSelect-selectMenu MuiInputBase-input MuiInput-input" tabindex="0" role="button" aria-haspopup="listbox" aria-labelledby="demo-simple-select-label demo-simple-select" id="demo-simple-select"><span>
                        <img src="https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/flags/Kuwait/kuwait_flag.png" width="20" height="20" class="mx-2">
                      </span>Kuwait</div>
                      <input name="country" aria-hidden="true" tabindex="-1" class="MuiSelect-nativeInput" value="24">
                      <svg class="MuiSvgIcon-root MuiSelect-icon" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M7 10l5 5 5-5z"></path>
                      </svg>
                    </div>
                  </div>

                  <div class="col-6 my-3">
                    <div class="MuiFormControl-root MuiTextField-root" style="width: 100%;">
                      <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated" data-shrink="false" for="blockTextField" id="blockTextField-label" dir="ltr">
                        Block
                      </label>
                      <div class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-formControl MuiInput-formControl" dir="ltr">
                        <input aria-invalid="false" id="blockTextField" name="block" v-model="block" type="text" class="MuiInputBase-input MuiInput-input" value="">
                      </div>
                    </div>
                  </div>
                  <div class="col-6 my-3">
                    <div class="MuiFormControl-root MuiTextField-root" style="width: 100%;">
                      <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated" data-shrink="false" for="streetTextField" id="streetTextField-label" dir="ltr">
                        Street
                      </label>
                      <div class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-formControl MuiInput-formControl" dir="ltr">
                        <input aria-invalid="false" id="streetTextField" name="street" v-model="street" type="text" class="MuiInputBase-input MuiInput-input" value=""></div>
                    </div>
                  </div>
                  <div class="col-6 my-3">
                    <div class="MuiFormControl-root MuiTextField-root" style="width: 100%;">
                      <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated" data-shrink="false" for="houseNumTextField" id="houseNumTextField-label" dir="ltr">
                        House #
                      </label>
                      <div class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-formControl MuiInput-formControl" dir="ltr">
                        <input aria-invalid="false" id="houseNumTextField" name="building" v-model="building" type="text" class="MuiInputBase-input MuiInput-input" value=""></div>
                    </div>
                  </div>
                  <div class="col-6 my-3">
                    <div class="MuiFormControl-root MuiTextField-root" style="width: 100%;">
                      <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated" data-shrink="false" for="avenueTextField" id="avenueTextField-label" dir="ltr">Avenue</label><div class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-formControl MuiInput-formControl" dir="ltr">
                      <input aria-invalid="false" id="avenueTextField" name="avenue" v-model="avenue" type="text" class="MuiInputBase-input MuiInput-input" value=""></div>
                    </div>
                  </div>
                  <div class="col-12 mt-3">
                    <div class="MuiFormControl-root MuiTextField-root MuiFormControl-fullWidth">
                      <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated" data-shrink="false" for="additionalTextField" id="additionalTextField-label" dir="ltr">Additional info</label>
                      <div class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-fullWidth MuiInput-fullWidth MuiInputBase-formControl MuiInput-formControl" dir="ltr">
                        <input aria-invalid="false" id="additionalTextField" name="additional" v-model="additional" type="text" class="MuiInputBase-input MuiInput-input" value="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>


<!--              <div class="col-12 mb-3">-->
              <!--                <div class="MuiAutocomplete-root MuiAutocomplete-hasClearIcon MuiAutocomplete-hasPopupIcon" role="combobox" aria-expanded="false" name="area">-->
              <!--                  <div class="MuiFormControl-root MuiTextField-root" style="width: 100%;">-->
              <!--                    <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated" data-shrink="false" for="areas" id="areas-label" dir="ltr">-->
              <!--                      Area-->
              <!--                    </label>-->
              <!--                    <div class="MuiInputBase-root MuiInput-root MuiInput-underline MuiAutocomplete-inputRoot MuiInputBase-formControl MuiInput-formControl MuiInputBase-adornedEnd">-->
              <!--                      <input aria-invalid="false" autocomplete="off" id="areas" type="text" class="MuiInputBase-input MuiInput-input MuiAutocomplete-input MuiAutocomplete-inputFocused MuiInputBase-inputAdornedEnd" aria-autocomplete="list" autocapitalize="none" spellcheck="false" value="">-->
              <!--                      <select name="area" id="area">-->
              <!--                        <option value="0">Choose Area</option>-->
              <!--                      </select>-->
              <!--                    </div>-->
              <!--                  </div>-->
              <!--                </div>-->
              <!--              </div>-->
<!--              <div class="MuiFormControl-root MuiTextField-root MuiFormControl-fullWidth">-->
<!--                <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated" data-shrink="false" for="address" id="standard-basic-label" dir="ltr">-->
<!--                  Address-->
<!--                </label>-->
<!--                <div class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-fullWidth MuiInput-fullWidth MuiInputBase-formControl MuiInput-formControl" dir="ltr">-->
<!--                  <input aria-invalid="false" id="address" name="address" v-model="address" type="text" class="MuiInputBase-input MuiInput-input" value="">-->
<!--                </div>-->
<!--              </div>-->

              <div class="MuiFormControl-root MuiTextField-root MuiFormControl-fullWidth" style="margin-bottom: 100px;">
                <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated" for="cash">Cash</label>
                <input v-on:click="paymentType('cash')" id="cash" name="payment_type" type="radio" class="MuiInputBase-input MuiInput-input">
                <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated" for="knet">K-NET</label>
                <input v-on:click="paymentType('knet')" id="knet" name="payment_type" type="radio" class="MuiInputBase-input MuiInput-input">
                <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated" for="credit">CREDIT CARD</label>
                <input v-on:click="paymentType('credit')" id="credit" name="payment_type" type="radio" class="MuiInputBase-input MuiInput-input">
                <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated" for="bookey">BOOKEY</label>
                <input v-on:click="paymentType('bookey')" id="bookey" name="payment_type" type="radio" class="MuiInputBase-input MuiInput-input">
              </div>


              <div class="MuiFormControl-root MuiTextField-root MuiFormControl-fullWidth">
                <!--                <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated" data-shrink="false" for="address" id="standard-basic-label" dir="ltr">-->
                <!--                  Address-->
                <!--                </label>-->
                <div class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-fullWidth MuiInput-fullWidth MuiInputBase-formControl MuiInput-formControl" dir="ltr">
                  <!--                  <input aria-invalid="false" id="address" name="address" v-model="address" type="text" class="MuiInputBase-input MuiInput-input" value="">-->
                </div>
              </div>

            </form>
          </div>
          <div class="action-button-english" style="background-color: white; padding-bottom: 8px; margin-bottom: 0px; height: 60px; z-index: 4;">
            <button v-on:click="createOrder()" class="MuiButtonBase-root MuiButton-root MuiButton-contained mb-1  ml-1 mx-auto MuiButton-containedPrimary" tabindex="0" type="button" dir="ltr" style="width: 97%; height: 100%; box-shadow: none; text-transform: none;">
              <span class="MuiButton-label">
                <span style="font-size: 1rem;">
                  Next
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
export default {
  name: "contactInfoComponent",
  data() {
    return{
      name: '',
      phone: '',
      email: '',
      address: '',
      payment_type: '',
      result: null,
      block: '',
      street: '',
      building: '',
      avenue: '',
      additional: '',
    }
  },
  created() {
  },
  methods: {
    createOrder() {
      let self = this

      let name = this.name
      let address = this.address
      let phone = this.result
      let email = this.email
      let payment_type = this.payment_type

      let block = this.block
      let street = this.street
      let building = this.building
      let avenue = this.avenue
      let additional = this.additional

      axios.post(APP_URL+'/createOrder', {
        'block': block,
        'street': street,
        'building': building,
        'avenue': avenue,
        'additional': additional,
        'name': name,
        'phone': phone,
        'email': email,
        'address': address,
        'payment_type': payment_type,
        'area': self.$parent.selectedArea,
      })
        .then(response => {
          if (response.data.type === 'success') {
            console.log(response.data)
            window.location = "/payment?id="+response.data.order_id
          }
        })
        .catch(e => {
          this.errors.push(e)
        })
    },
    paymentType(type) {
      this.payment_type = type
    }
  }
}
</script>

<style scoped>

</style>