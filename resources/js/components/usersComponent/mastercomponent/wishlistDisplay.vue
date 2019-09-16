<template>
  <!-- shopping-cart-area start -->
  <div class="cart-main-area pt-95 pb-100 wishlist">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h1 class="cart-heading">wishlist</h1>
          <form action="#">
            <div class="table-content table-responsive">
              <table>
                <thead>
                  <tr>
                    <th>remove</th>
                    <th>images</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(wishlist, index) in productWishlistDisplay"
                    :data="index"
                    :key="index.key"
                    >
                    <td class="product-remove">
                      <a href="#">
                        <i class="pe-7s-close"></i>
                      </a>
                    </td>
                    <td class="product-thumbnail">
                      <a href="#">
                        <img :src="'/uploads/product_image/' + wishlist.image" alt  width="85px" height="101px"/>
                      </a>
                    </td>
                    <td class="product-name">
                      <a href="#">{{ wishlist.name }}</a>
                    </td>
                    <td class="product-price-cart">
                      <span class="amount">${{ wishlist.price }}</span>
                    </td>
                    <td class="product-quantity">
                      <input value="1" type="number" v-model="quantity[index]"/>
                    </td>
                    <td class="product-subtotal">${{ wishlist.price*quantity[index] }}</td>
                  </tr>
                  <!-- <tr>
                    <td class="product-remove">
                      <a href="#">
                        <i class="pe-7s-close"></i>
                      </a>
                    </td>
                    <td class="product-thumbnail">
                      <a href="#">
                        <img src="assets/img/cart/2.jpg" alt />
                      </a>
                    </td>
                    <td class="product-name">
                      <a href="#">Vestibulum dictum</a>
                    </td>
                    <td class="product-price-cart">
                      <span class="amount">$150.00</span>
                    </td>
                    <td class="product-quantity">
                      <input value="1" type="number" />
                    </td>
                    <td class="product-subtotal">$150.00</td>
                  </tr>
                  <tr>
                    <td class="product-remove">
                      <a href="#">
                        <i class="pe-7s-close"></i>
                      </a>
                    </td>
                    <td class="product-thumbnail">
                      <a href="#">
                        <img src="assets/img/cart/3.jpg" alt />
                      </a>
                    </td>
                    <td class="product-name">
                      <a href="#">Vestibulum dictum</a>
                    </td>
                    <td class="product-price-cart">
                      <span class="amount">$150.00</span>
                    </td>
                    <td class="product-quantity">
                      <input value="1" type="number" />
                    </td>
                    <td class="product-subtotal">$150.00</td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- shopping-cart-area end -->
</template>

<script>
import { mapGetters } from "vuex";
export default {
  name: "wishlistDiplay",
  data: function() {
    return {
        total: Number,
        quantity: [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1],
    };
  },
  mounted() {
    this.$store.dispatch("fetchProductsWishlistDisplay");
  },
  computed: {
    ...mapGetters(["productWishlistDisplay"]),
    productWishlistDisplay() {
      return this.$store.getters.productWishlistDisplay;
    },
    // totalPrice(){
    //     for (var i=0; i<this.productWishlistDisplay.length; i++){
    //         this.quantity[i]=[1];
    //     }
    //     return ;
    // }
  }
};
</script>
