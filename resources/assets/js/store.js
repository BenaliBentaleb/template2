import Vuex from 'vuex'
import Vue from 'vue'


Vue.use(Vuex)



export const store = new Vuex.Store({

                state:{

                       
                        publications:[],
                        auth_user:{},
                      


                },
                
                
                getters:{
                   
                    all_publications(state){
                        return state.publications;
                    }
                   
                },

                
                mutations:{
                    add_publication(state,value) {
                        state.publications.push(value);
                    }
                }


});




