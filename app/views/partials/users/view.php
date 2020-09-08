    <template id="usersView">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">View  Users</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-12 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <div class="profile-bg mb-2">
                                    <div class="profile">
                                        <div class="">
                                            <div class="avatar"><niceimg width="100" height="100" :path="data.photo"></niceimg></div>
                                        </div>
                                        <h2 class="title">{{data.username}}</h2>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="text-bold">Account Detail</h5>
                                    <hr />
                                    <table class="table table-hover table-borderless table-striped">
                                        <tbody>
                                            <tr>
                                                <th class="title"> Id :</th>
                                                <td class="value"> {{ data.id }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Username :</th>
                                                <td class="value"> {{ data.username }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Email :</th>
                                                <td class="value"> {{ data.email }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Photo :</th>
                                                <td class="value"><niceimg :path="data.photo" width="400" height="400" ></niceimg> </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Data Registed :</th>
                                                <td class="value"> {{ data.data_registed }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> Status :</th>
                                                <td class="value"> {{ data.status }} </td>
                                            </tr>
                                            <tr>
                                                <th class="title"> User Role :</th>
                                                <td class="value"> {{ data.user_role }} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div v-if="editbutton || deletebutton || exportbutton" class="mt-2">
                                    <span >
                                        <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/users/edit/'  + data.id">
                                        <i class="fa fa-edit"></i> 
                                        </router-link>
                                        <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/users/delete/' + data.id">
                                        <i class="fa fa-times"></i> </button>
                                    </span>
                                </div>
                                <div v-show="loading" class="load-indicator static-center">
                                    <span class="animator">
                                        <clip-loader :loading="loading" color="gray" size="20px">
                                        </clip-loader>
                                    </span>
                                    <h4 style="color:gray" class="loading-text"></h4>
                                </div>
                                <div class="text-muted" v-if="!data && emptyrecordmsg != '' && !loading">
                                    <h4><i class="fa fa-ban"></i> No Record Found</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </template>
    <script>
	var UsersViewComponent = Vue.component('usersView', {
		template : '#usersView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'users',
			},
			routename : {
				type : String,
				default : 'usersview',
			},
			apipath: {
				type : String,
				default : 'users/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						id: '',username: '',email: '',photo: '',data_registed: '',status: '',user_role: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  Users';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					id: '',username: '',email: '',photo: '',data_registed: '',status: '',user_role: '',
				}
			},
		},
	});
	</script>
