<template>
    <div class="card shadow-sm mb-3 rounded-0">

        <!---------- Modal ---------->

        <jilsati-modal id="comments-modal" :title="modalTitle">
            <div v-if="resultMessage === ''">
                <div class="w-100 text-center mb-4">
                    <star-rating  v-model="rating" :rating="5" :star-size="20"></star-rating>
                </div>
                <div class="mb-3">
                    <label for="comment-textarea" class="mb-2">تعليق (اختياري)</label>
                    <textarea v-model="comment" rows="5" id="comment-textarea" class="form-control d-block" placeholder="التعليق"></textarea>
                </div>

                <div>
                    <button @click="submitRating" :disabled="ratingError" type="button" class="btn btn-success">
                        {{ratingButtonText}}
                    </button>
                </div>
            </div>
            <div v-else>
                <p class="w-100 h-100 h2">{{resultMessage}}</p>
            </div>
        </jilsati-modal>

        <!---------- end Modal ---------->

        <div class="card-body">
            <div>
                <p class="card-title mb-5 text-success h2 float-right">التقييمات</p>
                <div class="float-left text-center">
                    <button @click="onAddRating" type="button" class="btn btn-success" :disabled="!user || userAwnsJilsah">
                        {{ratingButtonText}}
                    </button>
                    <small v-if="!user || userAwnsJilsah" class="text-muted d-block">{{addRatingTip}}</small>
                </div>
            </div>
            <div class="clearfix"></div>

            <jilsati-fieldset v-if="userRating"  class="mb-4" legend="تقييمك" font-size="1.1rem">
                <div class="accordion">
                    <div>
                        <star-rating :rating="userRating.rating" :star-size="20" read-only></star-rating>
                    </div>
                    <div class="clearfix"></div>

                    <jilsati-alert v-if="userRating.comment" type="secondary">
                        {{userRating.comment}}
                    </jilsati-alert>
                </div>
            </jilsati-fieldset>

            <ul v-if="ratingsArray.length" class="list-unstyled">
                <li class="media mb-4" v-for="rating in ratingsArray">
                    <img src="/images/avatar.ico" width="32" height="32" class="ml-3" alt="...">
                    <div class="media-body">
                        <div>
                            <h5 class="mt-0 mb-1 float-right">{{rating.user.name}}</h5>
                            <div class="float-left text-center">
                                <star-rating read-only :show-rating="false" :rating="rating.rating" :star-size="20"></star-rating>
                                <small class="text-muted">{{rating.updated_at}}</small>
                            </div>
                        </div>
                        <div class="clearfix mb-2"></div>
                        <p>
                            {{rating.comment}}
                        </p>
                    </div>
                </li>
            </ul>

            <jilsati-alert v-else type="warning" class="text-center">
                لا يوجد اي تقييمات لهذه الجلسة
            </jilsati-alert>
        </div>
    </div>
</template>

<script>
    export default {
        props : {
            jilsah : {
                required : true,
                Object : Number
            },

            ratings : {
                type : Array,
                required : true,
            },
        },

        data : function(){
            return {
                user : undefined,

                userRating : undefined,

                resultMessage : '',

                modal : undefined,

                rating : 0,

                comment : '',

                ratingsArray : [],
            }
        },

        computed : {
            ratingError : function () {
                return this.rating === 0;
            },

            ratingButtonText : function () {
                return this.userRating ? 'تعديل التقييم' : 'اضف تقييمك';
            },

            modalTitle : function () {
                return this.userRating ? 'تعديل التقييم' : 'اضف تقييمك';
            },

            userAwnsJilsah : function () {
                return this.user ? this.user.id === this.jilsah.user_id : false;
            },

            addRatingTip : function () {
                return this.userAwnsJilsah ? 'انت منشئ الجلسة' : 'لازم تكون مسجل';
            }
        },

        methods : {
            onAddRating : function() {
                if(this.user && !this.userAwnsJilsah)
                    this.modal.modal('show');
            },

            submitRating : function () {
                if(!this.ratingError){
                    let formData = new FormData();

                    formData.append('jilsah_id',this.jilsah.id);
                    formData.append('rating',this.rating);
                    formData.append('comment',this.comment);

                    if(this.userRating){
                        formData.append('rating_id',this.userRating.id);
                    }

                    axios.post('/jilsahs/comment', formData)
                        .then(res=>{
                            if(this.userRating){
                                this.userRating.rating = this.rating;
                                this.userRating.comment = this.comment;
                            }else {
                                this.userRating = {
                                    id : res.data.id,
                                    user: {
                                        user_id: this.user.id,
                                        name : this.user.name
                                    },
                                    rating: this.rating,
                                    comment: this.comment
                                };

                                this.ratingsArray.push(this.userRating);
                            }

                        this.resultMessage = 'تم الحفظ بنجاح';
                        console.log(res);
                    }).catch(err=>{
                        console.log(err.response);
                        this.resultMessage = 'حصل خطأ الرجاء المحاولة لاحقا';
                    });
                }
            }
        },

        mounted() {
            this.user = this.$store.getters.user;

            this.modal = $('#comments-modal');

            this.modal.on('hidden.bs.modal', () => {
               //vue.rating = 0;
               this.resultMessage = '';
            });

            this.ratingsArray = this.ratings;

            this.userRating = this.user ? this.ratingsArray.find(rating => rating.user_id === this.user.id) : undefined;

            if(this.userRating) {
                this.rating = this.userRating.rating;
                this.comment = this.userRating.comment;
            }
        }
    }
</script>