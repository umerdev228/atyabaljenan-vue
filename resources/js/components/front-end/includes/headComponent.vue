<template>
  <header class="product-nav pd-nav-2">
    <nav class="product-navbar navbar navbar-expand-lg navbar-light ">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="http://atyabaljenan-vue.test/client/order-lookup">Order Status</a>
          </li>
          <li style="position: absolute; right: 90px; top: 13px;">
            <div class="dropdown bootstrap-select fit-width">
              <select class="selectpicker" data-width="fit">
                <option value="" selected="">Currency</option>

                <option value="KWD" data-content="<img src=&quot;https://upload.wikimedia.org/wikipedia/commons/a/aa/Flag_of_Kuwait.svg&quot; style=&quot; width: 24px;&quot; /> "></option>

                <option value="BD" data-content="<img src=&quot;https://upload.wikimedia.org/wikipedia/commons/6/6b/Flag_of_Bahrain_%283-2%29.svg&quot; style=&quot; width: 24px;&quot; /> "></option>

                <option value="OMR" data-content="<img src=&quot;https://upload.wikimedia.org/wikipedia/commons/9/9c/Flag_of_Oman_%283-2%29.svg&quot; style=&quot; width: 24px;&quot;/>"></option>
                <option value="QAR" data-content="<img src=&quot;https://upload.wikimedia.org/wikipedia/commons/6/65/Flag_of_Qatar.svg&quot; style=&quot; width: 24px;&quot;/>"></option>

                <option value="SAR" data-content="<img src=&quot;https://upload.wikimedia.org/wikipedia/commons/0/0d/Flag_of_Saudi_Arabia.svg&quot; style=&quot; width: 24px;&quot;/>"></option>
                <option value="AED" data-content="<img src=&quot;https://upload.wikimedia.org/wikipedia/commons/c/cb/Flag_of_the_United_Arab_Emirates.svg&quot; style=&quot; width: 24px;&quot;/> "></option>

              </select>
              <button type="button" tabindex="-1" class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-2" aria-haspopup="listbox" aria-expanded="false" title="Currency">
                <div class="filter-option">
                  <div class="filter-option-inner">
                    <div class="filter-option-inner-inner">
                      Currency
                    </div>
                  </div>
                </div>
              </button>
              <div class="dropdown-menu ">
                <div class="inner show" role="listbox" id="bs-select-2" tabindex="-1">
                  <ul class="dropdown-menu inner show" role="presentation">
                  </ul>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <button type="button" class="btn-language">
        <i>
          <a href="http://atyabaljenan-vue.test/lang/ar" style="background: whitesmoke;right: 0px;text-decoration: none;top: 16px;position: absolute;font-size: 28px;">
            <svg width="1em" height="1em" viewBox="0 0 32 32">
              <path fill-rule="evenodd"
                    d="M22 22.424c-1.099.95-2.388 1.675-3.868 2.174-.952.268-1.919.402-2.901.402-1.48 0-2.721-.399-3.725-1.197C10.502 23.006 10 21.711 10 19.921c0-.743.117-1.463.35-2.16.233-.698.65-1.403 1.252-2.115.289-.317.505-.553.65-.708.144-.155.271-.266.382-.333-.792-.683-1.188-1.346-1.188-1.992-.03-.749.497-1.857 1.584-3.325C13.779 8.429 14.605 8 15.507 8c.455 0 .91.132 1.368.397.457.265.792.488 1.004.667.212.18.39.375.534.585.144.21.216.412.216.607-.006.03-.021.046-.046.046-.847-.305-1.565-.457-2.155-.457-.233 0-.532.054-.898.16-.365.107-.744.3-1.137.58-.393.28-.59.563-.59.85 0 .286.274.59.82.913.547.323.875.506.986.548.233-.03 1.092-.231 2.578-.603l1.073-.205c.237-.046.557-.117.963-.215l-.857 2.64h-.064c-.24 0-.792.085-1.658.256-4.163.962-6.244 2.552-6.244 4.768 0 .396.224.84.672 1.334.995.719 2.22 1.163 3.675 1.334.46.085.878.14 1.252.164.375.025 1.02.052 1.934.082A122.29 122.29 0 0122 22.424z">
              </path>
            </svg>
          </a>
        </i>
      </button>
      <a href="http://atyabaljenan-vue.test/client/revieworder" class="btn-language" onmouseover="this.style.color='hsl(0,0%,86%)';" onmouseout="this.style.color='white';" style="font-size: 16px;right: 34px;text-decoration: none;top: 16px;background: whitesmoke;position: absolute;padding-top: 8px;">
        <router-link :to="{name: 'OrderReview'}" class="nav-item nav-link">
        <i class="fa fa-shopping-cart"></i>{{$parent.cart}}
        </router-link>
      </a>
    </nav>
  </header>
</template>

<script>
export default {
  name: "header"
}
</script>

<style scoped>

</style>