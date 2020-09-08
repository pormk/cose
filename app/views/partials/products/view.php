    <template id="productsView">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">View  Products</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-12 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <div v-show="!loading">
                                    <div ref="datatable" id="datatable">
                                        <table class="table table-hover table-borderless table-striped">
                                            <!-- Table Body Start -->
                                            <tbody>
                                                <tr>
                                                    <th class="title"> Id :</th>
                                                    <td class="value"><router-link :to="'/products/view/' +  data.id">{{data.id}}</router-link></td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Title :</th>
                                                    <td class="value"> {{ data.title }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Description :</th>
                                                    <td class="value"> {{ data.description }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Photo :</th>
                                                    <td class="value"><niceimg :path="data.photo" width="400" height="400" ></niceimg> </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Price :</th>
                                                    <td class="value"> {{ data.price }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Quantity :</th>
                                                    <td class="value"> {{ data.quantity }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Date Added :</th>
                                                    <td class="value"> {{ data.date_added }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Added By :</th>
                                                    <td class="value"> {{ data.added_by }} </td>
                                                </tr>
                                            </tbody>
                                            <!-- Table Body End -->
                                        </table>
                                    </div>
                                    <div v-if="editbutton || deletebutton || exportbutton" class="py-3">
                                        <span >
                                            <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/products/edit/'  + data.id">
                                            <i class="fa fa-edit"></i> 
                                            </router-link>
                                            <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/products/delete/' + data.id">
                                            <i class="fa fa-times"></i> </button>
                                        </span>
                                        <button @click="exportRecord" class="btn btn-sm btn-primary" v-if="exportbutton">
                                            <i class="fa fa-save"></i> 
                                        </button>
                                    </div>
                                </div>
                                <div v-show="loading" class="load-indicator static-center">
                                    <span class="animator">
                                        <clip-loader :loading="loading" color="gray" size="20px">
                                        </clip-loader>
                                    </span>
                                    <h4 style="color:gray" class="loading-text"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </template>
    <script>
	var ProductsViewComponent = Vue.component('productsView', {
		template : '#productsView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'products',
			},
			routename : {
				type : String,
				default : 'productsview',
			},
			apipath: {
				type : String,
				default : 'products/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						id: '',title: '',description: '',photo: '',price: '',quantity: '',date_added: '',added_by: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  Products';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					id: '',title: '',description: '',photo: '',price: '',quantity: '',date_added: '',added_by: '',
				}
			},
		},
	});
	</script>
