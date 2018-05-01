import Vuex from 'vuex'
import Vue from 'vue'


Vue.use(Vuex)



export const store = new Vuex.Store({

                state:{

                    publications:[],   
                    likes: [],
                    likedBy: [],
                      


                },
                
                
                getters:{
                   
                    allPublications(state){
                        return state.publications;
                    },

                    allLikes(state) {
                        return state.likes;
                    },

                    likedBy(state) {
                        return state.likedBy;
                    }
                   
                },

                
                mutations:{
                    addPublication(state,value) {
                        state.publications.push(value);
                    },

                    addLike(state,value) {
                        state.likes.push(value);
                    },
                    
                    addLiker(state,value) {
                        state.likedBy.push(value);
                    }



                }


});




