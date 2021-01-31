<template>
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 products-ltr">
    <div class="row">
      <header class="order-header">
        <h1>Choose Area</h1>
        <button type="button" class="btn-back">
          <a href="">
            <i>
              <svg width="1em" height="1em" viewBox="0 0 32 32">
                <path fill="currentColor" fill-rule="evenodd" d="M10.414 17l4.293 4.293a1 1 0 01-1.414 1.414l-6-6a1 1 0 010-1.414l6-6a1 1 0 111.414 1.414L10.414 15H24a1 1 0 010 2H10.414z"></path>
              </svg>
            </i>
          </a>
        </button>
      </header>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
            Delivery
          </a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div v-for="(government, parent) in governments" style="background-color: white;">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" :data-target="'#collapse-'+parent" aria-expanded="true" aria-controls="collapseOne">
                      {{ government.name }} <i class="fas fa-angle-down"></i>
                    </button>
                  </h2>
                </div>
                <div v-for="area in government.areas" :id="'collapse-'+parent" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body" style="padding:10px!important;padding-left: 40px!important;">
                    <a style="color: black;" @click="selectArea(area)" href="javascript:void(0)">
                      <h6 style="border-left: 2px solid #000000;padding-left: 7px;">
                        {{ area.name }}
                    </h6>
                    </a>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "DeliveryAreaListComponent",
  data() {
    return {
      governments: [],
    }
  },
  created() {

  },
  mounted() {
    this.getAllAreas()
  },
  methods: {
    getAllAreas() {
      let self = this
      axios.get(APP_URL+'/api/getAllAreas')
          .then(response => {
            if (response.data.type === 'success') {
              self.governments = response.data.governments
            }
          })
          .catch(e => {
            alert(e)
          })
    },
    selectArea(area) {
      let self = this
      localStorage.setItem('selected-area', JSON.stringify(area))
      self.$parent.selectedArea = area
      self.$router.go(-1)

    }
  }
}
</script>

<style>
.nav-link.active {
  outline: none;
  border-bottom: 2px solid !important;
  padding: 4px 0px;
  border-width:0px;
}

.accordion>.card{
  border:0px;
}

.accordion>.card>.card-header{
  background-color: white;
  border-bottom:0px;
  padding-right: 12px;
}
.card {
  background-color: white;
}
.btn-link {
  font-weight: 500;
  color: black;
  text-decoration: none;
  width: 100%;
  text-align: left;
  padding: 0 0 0 9px;
}

.btn-link i {
  float: right;
}

.btn-link:hover {
  color: black;
  text-decoration: none;
}
.tab-content {
  width: 100%;
}

</style>