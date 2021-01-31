import Home from './components/front-end/home/home.vue';
import Products from './components/front-end/categories/detailComponent.vue';
import ProductsDetails from './components/front-end/products/detailComponent.vue';
import Areas from './components/front-end/area/DeliveryAreaListComponent.vue';
import OrderReview from './components/front-end/order/reviewOrderComponent.vue';
import ContactInfo from './components/front-end/contact/contactInfoComponent.vue';
import DeliveryAddress from './components/front-end/delivery/deliveryAddressComponent.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'CategoryDetails',
        path: '/:id/products',
        component: Products
    },
    {
        name: 'ProductDetails',
        path: '/products/:id',
        component: ProductsDetails
    },
    {
        name: 'AreasList',
        path: '/areas',
        component: Areas
    },
    {
        name: 'OrderReview',
        path: '/order-review',
        component: OrderReview
    },
    {
        name: 'ContactInfo',
        path: '/contact/info',
        component: ContactInfo
    },
    {
        name: 'DeliveryInfo',
        path: '/delivery/info',
        component: DeliveryAddress
    },
];