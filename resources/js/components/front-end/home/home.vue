<template>
  <div class="p-0 h-100">
    <ul class="MuiList-root MuiList-padding" style="width: 100%; margin-top: 0; padding: 3px 0 0; background-color: white;">
      <a class="makeLinkNormal" href="/contact">
        <div class="MuiButtonBase-root MuiListItem-root pt-1 MuiListItem-button MuiListItem-alignItemsFlexStart" tabindex="0" role="button" aria-disabled="false" style="margin-left: 0px; padding-right: 0px; padding-left: 15px; padding-bottom: 4px;">
          <div class="MuiListItemAvatar-root MuiListItemAvatar-alignItemsFlexStart">
            <div class="MuiAvatar-root MuiAvatar-rounded" style="width: 60px; height: 60px; margin-bottom: 9px;">
              <img :src="$parent.settings.logo" class="MuiAvatar-img">
            </div>
          </div>
          <div class="MuiListItemText-root ml-3 MuiListItemText-multiline">
            <span class="MuiTypography-root MuiListItemText-primary MuiTypography-body1 MuiTypography-displayBlock">
              <p style="font-size: 14px; font-weight: bold;">{{ $parent.site_name }}</p>
            </span><p class="MuiTypography-root MuiListItemText-secondary MuiTypography-body2 MuiTypography-colorTextSecondary MuiTypography-displayBlock">
            <span class="MuiTypography-root MuiTypography-body2 MuiTypography-colorTextPrimary" style="font-size: 0.9rem; color: rgb(95, 95, 95);">
<!--              "The Art of Nature"-->
            </span>
            <div style="position: relative; bottom: -5px; left: 0px; direction: ltr; margin-top: 2px;">
            <span style="margin-right: 5px; margin-left: 0px;">
              <span order="1">
                <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true" style="color: rgb(55, 173, 73); position: relative; top: 1px; width: 2px;">
                  <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"></path>
                </svg>
              </span>
            </span>
            <span style="margin-right: 5px; margin-left: 5px;">
              <span order="2">
                <span style="position: relative; right: -4px; top: 1px;">
                  <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true" style="position: absolute; width: 2px; height: 12px; top: -3px; color: rgb(224, 51, 51);">
                    <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"></path>
                  </svg>
                  <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true" style="color: rgb(210, 210, 210); width: 2px;">
                    <path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"></path>
                  </svg>
                </span>
              </span>
            </span>
            <span style="margin-left: 5px; margin-right: 0px;">
              <span style="position: relative; top: 2px; font-weight: bold; border-radius: 3px; color: rgb(153, 153, 153);"></span>
            </span>
          </div>
          </div>
          <div class="MuiListItemIcon-root MuiListItemIcon-alignItemsFlexStart" style="margin: auto;">
            <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path>
            </svg>
          </div>
          <span class="MuiTouchRipple-root"></span>
        </div>
      </a>
    </ul>
    <div style="height: auto; margin-top: 1px; background-color: white; border-bottom: 1px solid rgb(212, 213, 212);">
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
      <li class="MuiDivider-root" role="separator" style="height: 4px; background-color: rgb(244, 245, 245);"></li>
      <div></div>
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
    </div>
    <span></span>
    <div class="px-0" style="padding: 20px 0px;">
      <div class="sc-bdVaJa imYUvI"><div class="sc-bwzfXH gwZiig">
        <div class="sc-htpNat grBOFc" style="transform: translateX(0px);"></div>
      </div>
      </div>
    </div>
    <div class="row text-center justify-content-between m-0 w-100" dir="ltr">
      <div v-for="category in filteredCategories" :style="{'height': '164px',  'width': '45%', 'border-radius': '7px', 'margin-bottom': '3px', 'background': 'url('+category.image+') center center / cover no-repeat', 'background-size': '200px', 'border': '1px solid white', 'min-height': '240px'}">
        <router-link :to="{name: 'CategoryDetails', params: { id: category.id }}" class="nav-item nav-link">
          <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
          <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">
            {{ category.category }}
          </p>
        </router-link>
      </div>

    </div>
    <div class="free-space-115"></div>
    <div class="free-space-50"></div>
    <div class="action-button-english" style="background-color: white; padding-bottom: 8px; margin-bottom: 0px; height: 60px; z-index: 4;">
      <button v-on:click="$router.push('/order-review')" class="MuiButtonBase-root MuiButton-root MuiButton-contained mb-1  ml-1 mx-auto MuiButton-containedPrimary" tabindex="0" type="button" dir="ltr" :style="{'width': '97%', 'height': '100%', 'box-shadow': 'none', 'text-transform': 'none', 'background': $parent.settings.button_color}">
        <span class="MuiButton-label">
          <span class="px-1" style="position: absolute; left: 10px; top: 6px; line-height: 34px; background: rgba(0, 0, 0, 0.3); border-radius: 7px; min-width: 32px; height: 32px; font-size: 1rem;">{{ $parent.quantity }}</span>
          <span style="font-size: 1rem;">Review Order</span>
          <span style="position: absolute; right: 10px; top: 6px; line-height: 34px; border-radius: 7px; min-width: 32px; height: 32px; font-size: 1rem;">{{ $parent.price }}</span>
        </span>
        <span class="MuiTouchRipple-root"></span>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "home",
  data() {
    return {
      categories: [],
      area: null,
      search: '',
    }
  },
  created() {
  },
  mounted() {
    this.getAllCategories()
  },
  computed:{
    filteredCategories:function(){
      var self=this;
      return self.categories.filter(function(val){
        console.log(val.category.includes((self.search).toLowerCase()))
        return val.category.toLowerCase().includes(self.search.toLowerCase());
      })
    }
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

  }
}
</script>

<style>

.visitor-box {
  pointer-events: none;
}

div#online-inner {
  height: 20px;
  overflow: hidden;
  pointer-events: none !important;
  float: left;
  width: 77px;
}

#online-inner img.counterimg {
  transform: translateY(-69px);
}

#online span {
  font-size: 12px;
  display: block;
  color: #888;
  line-height: 14px;
  width: 240px;
}

div#online {
  width: 240px;
  box-shadow: 1px 1px 11px;
  display: block;
  margin: 0 auto;
}
div#online-inner2 {
  height: 20px;
  overflow: hidden;
  pointer-events: none !important;
  float: left;
  width: 77px;
}

#online-inner2 img.counterimg {
  transform: translateY(-69px);
}

#online2 span {
  font-size: 12px;
  display: block;
  color: #888 !important;
  line-height: 14px;
  width: 240px;
}

div#online2 {
  padding: 10px;
  width: 240px;
  box-shadow: 1px 1px 11px;
  display: block;
  margin: 0 auto;
}
#online2 {
  margin-top: 8px !important;
  display:none !important;    }
#online {
  padding: 10px;
  display:none !important;

}
</style>
