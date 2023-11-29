<template>
    <div class="container rounded bg-white mt-4 mb-4">
    <div class="row">
        <div class="col-md-6 section-left">
            <div class="col-md-12 mb-3 mt-2">
                <div class="menu">
                    <div class="progress iMg" style="height: 5px;">
                        <div class="progress-bar progress-bar-striped" id="progressbar" role="progressbar" :style="{ width: progress +'%' }" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div @click="position(8)" class="jHmzai" ><div class="dpzdms">PROFILE</div><div></div></div>
                    <div @click="position(22)" class="jHmzai"><div class="dpzdms">CONTACT</div><div></div></div>
                    <div @click="position(36)" class="jHmzai"><div class="dpzdms">EDUCATION</div><div></div></div>
                    <div class="jHmzai" @click="position(50)"><div class="dpzdms">EXPERIENCE</div><div></div></div>
                    <div class="jHmzai" @click="position(64)"><div class="dpzdms">SKILLS</div><div></div> </div>
                    <div class="jHmzai" @click="position(78)"><div class="dpzdms">LANGUAGES</div><div></div></div>
                    <div class="jHmzai" @click="position(92)"><div class="dpzdms">FINISH</div><div></div></div> 
                </div>
            </div>
            <form @submit.prevent="submit">
                <input id="title" type="hidden">
                <div class="col-md-12 border-right content-left">
                    <div class="alert alert-success" v-show="success">Your CV it is Save</div>
                    <div class="p-3 py-2">
                        <!-- *************** form 0 ****************************-->
                        <div v-if="pos == 8" id="8">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Profile</b></h4>
                                {{message}}
                            </div>
                            <h5>Please enter your profile informations</h5>
                            <span>This allows employers to know who you are.</span><br/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12 py-1">
                                        <label for="name">Name *</label>
                                        <input v-model="fields.name" type="text" id="name" name="name" class="form-control">
                                        <span class="alert alert-danger" v-show="errors && errors.name">{{ errors.name }}</span>
                                    </div>
                                    <div class="col-md-12 py-1">
                                        <label for="lastName">Last Name *</label>
                                        <input v-model="fields.lastName" type="text" id="lastName" name="lastname" class="form-control" >
                                        <span class="alert alert-danger" v-show="errors && errors.lastName">{{ errors.lastName }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">   
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <span for="image" class="border px-3 p-1 add-button">
                                            Chosse Image
                                            <!-- <input type="file" id="image" @change="handleImageChange" accept="image/*"> -->
                                            <input @change="handleImageChange" type="file" name="image_profile" id="image" class="form-control form-control-sm" accept=".png, .jpg, .jpeg, .bmp" >
                                        </span>
                                        <div v-if="fields.image_profile">
                                            <img  class="img-thumbnail" width="125" :src="imageUrl" alt="Image Principale" >
                                        </div>
                                        <span class="alert alert-danger" v-show="errors && errors.image_profile">{{ errors.image_profile }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 py-1">
                                    <label for="date_birth">Date Birth *</label>
                                    <input v-model="fields.date_birth" type="date" id="date_birth" name="date_birth" min="{{ date('Y-m-d', strtotime('-60 years'))}}" max="{{ date('Y-m-d', strtotime('-15 years'))}}" class="form-control">
                                    <span class="alert alert-danger" v-show="errors && errors.date_birth">{{ errors.date_birth }}</span>
                                </div>
                                
                                <div class="col-md-6 py-1">
                                    <label for="">Gender *</label>
                                    <div class="row" style="padding: 4px 15px;">
                                        <div class="col-md-5">
                                        <!-- onchange="change(event)" -->
                                            <label for="M" class="form-check-label">
                                                <input v-model="fields.gender" name="gender" type="radio" id="M" class="form-check-input" checked value="male"><label for="M"> Male</label>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="F" class="form-check-label">
                                                <input v-model="fields.gender" name="gender" type="radio" id="F" class="form-check-input" value="female"><label for="M"> Female</label>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 py-1">
                                    <label for="country">Country *</label>
                                    <select v-model="fields.country" class="form-select" id="country" name="country" aria-label="Default select example">
                                        <option disabled value="">Please select country</option>
                                    </select>
                                    <span class="alert alert-danger" v-show="errors && errors.country">{{ errors.country }}</span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 py-1">
                                    <label for="hobbies">Hobbies </label>
                                    <input v-model="fields.hobbies" type="text" id="hobbies" name="hobbies" class="form-control" placeholder="for exmple: Sport, Cinema, Cooking, Music">
                                    <span class="alert alert-danger" v-show="errors && errors.hobbies">{{ errors.hobbies }}</span>
                                </div>
                                <div class="col-md-6 py-1">
                                    <label for="hobbies">Title profile </label>
                                    <input v-model="fields.title" type="text" id="title" name="title" class="form-control" placeholder="for exmple: Developer, Accountant">
                                    <span class="alert alert-danger" v-show="errors && errors.title">{{ errors.title }}</span>
                                </div>
                            </div>
                            
                            <div class="form-group py-1">
                                <label for="my_profile">Profile</label>
                                <textarea v-model="fields.my_profile" type="text" id="my_profile" name="my_profile" class="form-control" placeholder="talk about your self" rows="2"></textarea>
                                <span class="alert alert-danger" v-show="errors && errors.my_profile">{{ errors.my_profile }}</span>
                            </div>
                        </div> 

                        <!-- *************** form 1 ****************************-->
                        <div v-if="pos == 22" id="22">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Contact</b></h4>
                            </div>
                            <h5>Please enter your contact informations</h5>
                            <span>This allows employers to contact you.</span>
                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <label class="labels">Address</label>
                                    <input v-model="fields.address" id="address" type="text" name="address" class="form-control contact" pattern="^[a-zA-Z0-9 -+°]{5,60}">
                                    <span style="color:red;"></span>
                                </div>
                                <div class="col-md-6 py-2">
                                    <label class="labels">City</label>
                                    <input v-model="fields.city" type="text" id="Adcity" name="city" class="form-control contact" pattern="^[a-zA-Z ]{3,20}" minlength="3" maxlength="20">
                                    <span style="color:red;"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 py-1">
                                    <label class="labels">Phone 1</label>
                                    <input v-model="fields.phone1" type="text" id="phone1" name="phone1" class="form-control contact" pattern="^[0-9 ()-,+]{10,13}$" minlength="10" maxlength="13">
                                    <span style="color:red;"></span>
                                </div>
                                <div class="col-md-6 py-1">
                                    <label class="labels">Phone 2</label>
                                    <input v-model="fields.phone2" type="text" id="phone2" name="phone2" class="form-control contact" pattern="^[0-9 ()-,+]{10,13}$" minlength="10" maxlength="13">
                                    <span style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-md-12 py-1">
                                <label class="labels">Email</label>
                                <input v-model="fields.email" type="text" id="email" name="email" class="form-control contact" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" minlength="5" maxlength="35">
                                <span style="color:red;"></span>
                            </div>
                            <div class="col-md-12 py-1">
                                <label class="labels">Linkedin</label>
                                <input v-model="fields.linkedin" type="text" id="linkedin" name="linkedin" class="form-control contact" maxlength="70" placeholder="www.linkedin.com/in/name-lastname">
                                <span style="color:red;"></span>
                            </div>
                        </div> 

                        <!-- *************** form 2 ****************************-->
                        <div v-if="pos == 36" id="36">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4><b>Education or Certificates</b></h4>
                            </div>
                            <h5>You have to enter data related to your studies </h5>
                            <span>Enter your last degree diploma</span>
                            <div class="row">
                                <div id="EDUCATION" class="cYNMV">
                                    <div class="czYJLT listEtu" id="setEtu">
                                        <div class="fnXcmN">
                                            <div class="jEQib eSepnq">
                                                <p class="ignblp showetu" id="id"></p>
                                                <div class="bfNMLE">
                                                    <button class="eNmQca kbFMmR remove">
                                                        <ion-icon name="close-circle-outline"></ion-icon>
                                                    </button>
                                                    <button class="eNmQca kbFMmR ikHWQs">
                                                        <ion-icon name="chevron-up-outline"></ion-icon>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="set">
                                                <div class="row py-2">
                                                    <div class="col-md-6 py-1">
                                                        <label class="labels">Certificate Name</label>
                                                        <input v-model="fields.certificate" name="certificate[]" class= "form-control" pattern="^[a-zA-Z0-9 -+]{3,30}$" >
                                                        <span style="color:red;"></span>
                                                    </div>
                                                    <div class="col-md-6 py-1">
                                                        <label class="labels">Institution Name</label>
                                                        <input v-model="fields.institute_name" name="institute_name[]" class= "form-control inst_name" pattern="^[a-zA-Z0-9 -]{3,30}$">
                                                        <span style="color:red;"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 py-1">
                                                        <label class="labels">Specialty</label>
                                                        <input v-model="fields.Specialty_name" name="Specialty_name[]" class = "form-control specialty" pattern="^[a-zA-Z0-9 -]{3,30}$">
                                                        <span style="color:red;"></span>
                                                    </div>
                                                    <div class="col-md-6 py-1">
                                                        <label class="labels">Date Obtaining</label>
                                                        <select v-model="fields.date_obtaining" name="date_obtaining[]" class= "form-control">
                                                            <option v-for="year in availableYears" :key="year" :value="year">{{ year }}</option>
                                                        </select>
                                                        <span style="color:red;"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 py-1">
                                                    <label class="labels">Description</label>
                                                    <textarea v-model="fields.description" name="description[]"  maxlength="130" class ="form-control other_info"></textarea>
                                                    <span style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="dxqSpv"></div>
                                        </div>
                                    </div>
                                    <div class="gAWxhx cFgtZv border-top" id="addEtu">
                                        <span class="jLopio">
                                            <span class="fguQPT">
                                                <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="isBodP"><g fill-rule="nonzero"><path xmlns="http://www.w3.org/2000/svg" fill="#1688fe" fill-rule="evenodd" d="M8 0a8 8 0 110 16A8 8 0 018 0zm0 2a6 6 0 100 12A6 6 0 008 2zm1 2v3h3v2H9v3H7V9H4V7h3V4h2z"></path></g></svg>
                                            </span>
                                        </span>
                                        <span class="hsNWet">Add new certificate</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <!-- *************** form 3 ****************************-->
                        <div v-if="pos == 50" id="50">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Work Experience or Traineeship</b></h4>
                            </div>
                            <h5>Talk about your experience</h5>
                            <span>Start with your most recent experience</span>
                            <div class="row">
                                <div id="Experience" class="cYNMV">
                                    <div class="czYJLT listExp" id="setExp">
                                        <div class="fnXcmN border rounded border-danger">
                                            <div class="jEQib eSepnq">
                                                <p class="ignblp showetu" id=""></p>
                                                <div class="bfNMLE">
                                                    <button class="eNmQca kbFMmR remove">
                                                        <ion-icon name="close-circle-outline"></ion-icon>
                                                    </button>
                                                    <button class="eNmQca kbFMmR ikHWQs">
                                                        <ion-icon name="chevron-up-outline"></ion-icon>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="set" id="showEtu">
                                                <div class="row py-2">
                                                    <div class="col-md-6 py-1" >
                                                        <label class="labels">Job post</label>
                                                        <input name="namJob[]" class="form-control">
                                                        <span style="color:red;"></span>
                                                    </div>
                                                    <div class="col-md-6 py-1">
                                                        <label class="labels">Company name or Institution Name</label>
                                                        <input name="institution[]" class="form-control">
                                                        <span style="color:red;"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 py-1">
                                                        <label class="labels">Start date </label>
                                                        <input type="month" min="1970-01" name="startdate[]" class = "form-control">
                                                        <span style="color:red;"></span>
                                                    </div>
                                                    <div class="col-md-4 py-1">
                                                        <label class="labels">End date</label>
                                                        <input type="month" min="1970-01" name="enddate[]" class = "form-control">
                                                        <span style="color:red;"></span>
                                                    </div>
                                                    <div class="col-md-4 py-1">
                                                        <label class="labels">City</label>
                                                        <input name="city_exp[]" class = "form-control" >
                                                        <span style="color:red;"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 py-1">
                                                    <input type="checkbox" name="currently_here[]">
                                                    <label class="labels" for="currently_here[]"> I currently work here</label>
                                                </div>
                                                <div class="col-md-12 py-1">
                                                    <label class="labels">Description</label>
                                                    <textarea name="otherinfo[]" maxlength="120" class = "form-control"></textarea>
                                                    <span style="color:red;"></span>
                                                </div>
                                            </div>   
                                            <div class="dxqSpv"></div>         
                                        </div>
                                    </div>
                                    <div class="gAWxhx cFgtZv border-top" id="addexp">
                                        <span class="jLopio">
                                            <span class="fguQPT">
                                                <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="isBodP"><g fill-rule="nonzero"><path xmlns="http://www.w3.org/2000/svg" fill="#1688fe" fill-rule="evenodd" d="M8 0a8 8 0 110 16A8 8 0 018 0zm0 2a6 6 0 100 12A6 6 0 008 2zm1 2v3h3v2H9v3H7V9H4V7h3V4h2z"></path></g>
                                                </svg>
                                            </span>
                                        </span>
                                        <span class="hsNWet">Add new experience</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- *************** form 4 ****************************-->
                        <div v-if="pos == 64" id="64">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Skills</b></h4>
                            </div>
                            <h5>Talk about your skills that you master</h5>
                            <span>This allows employers to learn your professional skills.</span>
                            <div class="row">
                                <div id="EDUCATION" class="cYNMV">
                                    <div class="czYJLT" id="setSkill">
                                        <div class="fnXcmN border rounded border-danger">
                                            <div class="jEQib eSepnq">
                                                <p class="ignblp showetu"></p>
                                                <div class="bfNMLE">
                                                    <button class="eNmQca kbFMmR remove">
                                                        <ion-icon name="close-circle-outline"></ion-icon>
                                                    </button>
                                                    <button class="eNmQca kbFMmR ikHWQs">
                                                        <ion-icon name="chevron-up-outline"></ion-icon>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="set">
                                                <div class="row py-2">
                                                    <div class="col-md-6 py-1">
                                                        <label class="labels">Skill</label>
                                                        <input name="skill[]" class="form-control" >
                                                        <span style="color:red;"></span>
                                                    </div>
                                                    <div class="col-md-6 py-1">
                                                        <label for="level" class="col-md-12">Level</label>
                                                        <div class="row py-1 flex-nowrap">
                                                            <input type="hidden" name="level_skills[]" class="form-control" >
                                                            <input type="range" style="width:57%;padding-left: 20px;" size="1" class="form-range" min="0" max="4" step="1" value="0">
                                                            <span class="col-md-5" id="show-sk-lev"></span>
                                                        </div>
                                                        <span style="color:red;"></span>
                                                    </div> 
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gAWxhx cFgtZv border-top"  id="addskill">
                                        <span class="jLopio">
                                            <span class="fguQPT">
                                                <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="isBodP"><g fill-rule="nonzero"><path xmlns="http://www.w3.org/2000/svg" fill="#1688fe" fill-rule="evenodd" d="M8 0a8 8 0 110 16A8 8 0 018 0zm0 2a6 6 0 100 12A6 6 0 008 2zm1 2v3h3v2H9v3H7V9H4V7h3V4h2z"></path></g>
                                                </svg>
                                            </span>
                                        </span>
                                        <span class="hsNWet">Add new skill</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- *************** form 5 ****************************-->
                        <div v-if="pos == 78" id="78">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Languages</b></h4>
                            </div>
                            <h5>Languages that you master</h5>
                            <span>This allows employers to learn about your language skills.</span>
                            <div class="row">
                                <div id="EDUCATION" class="cYNMV">
                                    <div class="czYJLT" id="setLang">
                                        <div class="fnXcmN border rounded border-danger">
                                            <div class="jEQib eSepnq">
                                                <p class="ignblp showetu" id=""></p>
                                                <div class="bfNMLE">
                                                    <button class="eNmQca kbFMmR remove">
                                                        <ion-icon name="close-circle-outline"></ion-icon>
                                                    </button>
                                                    <button class="eNmQca kbFMmR ikHWQs">
                                                        <ion-icon name="chevron-up-outline"></ion-icon>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="set">
                                                <div class="row py-2">
                                                    <div class="col-md-6 py-1">
                                                        <label class="labels">Langue</label>
                                                        <input name="language[]" class="form-control" >
                                                        <span style="color:red;"></span>
                                                    </div>
                                                    <div class="col-md-6 py-1"><label for="level" class="col-md-12">Level</label>
                                                        <div class="row py-1 flex-nowrap">
                                                            <input type="hidden" name="level_lang[]" class="form-control" >
                                                            <input type="range" style="width:57%;padding-left: 20px;"  size="1" class="form-range" min="0" max="4" step="1" value="0">
                                                            <span class="col-md-5" id="">Beginner</span>
                                                        </div> 
                                                        <span style="color:red;"></span>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gAWxhx cFgtZv border-top" id="addlang">
                                        <span class="jLopio">
                                            <span class="fguQPT">
                                                <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="isBodP"><g fill-rule="nonzero"><path xmlns="http://www.w3.org/2000/svg" fill="#1688fe" fill-rule="evenodd" d="M8 0a8 8 0 110 16A8 8 0 018 0zm0 2a6 6 0 100 12A6 6 0 008 2zm1 2v3h3v2H9v3H7V9H4V7h3V4h2z"></path></g>
                                                </svg>
                                            </span>
                                        </span>
                                        <span class="hsNWet">Add new langue</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- *************** form 6 ****************************-->
                        <div v-if="pos == 92" id="92">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Finish</b></h4>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="footer-bass mt-4 d-flex justify-content-between">
                    <div v-if="pos > 8" class="div-back-btn">
                        <div class="btn-back btn float-start" id="back_btn" @click="back(14)">❮ Go Back</div>
                    </div>
                    <div v-if="pos == 92" class="div-next-btn">
                        <button type="submit" id="save-btn" class="btn-next btn btn-primary">Save 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
                            </svg>
                        </button>
                    </div>
                    <div v-if="pos < 92" class="div-next-btn">
                        <div class="btn-next btn btn-primary float-end" id="next_btn" @click="next(14)">Next ❯</div>
                    </div>
                </div>
                <!-- <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </div> -->
            </form>
        </div>
        <div class="col-md-6 ">
            <div class="row border-start position-relative" style="height:750px;background-color: rgb(229, 228, 234);border-radius: 10px;">
                <div class=" bg-light" style="height: 50px;">
                    <div class="d-flex justify-content-start" style="padding: 5px; ">
                        <div class="p-2 bd-highlight col-md-3">
                            <select class="form-select form-select-sm" aria-label="form-select-sm example" id="templet" value="">
                                <option selected value="cv_templet2">Model 1 </option>
                                <option value="cv_templet1">Model 2</option>
                            </select>
                        </div>
                        <div class="p-1 bd-highlight" style="display: inline-flex;" >
                            <!-- <label for="ColorInput" class="form-label">Color picker </label> -->
                            <input type="color" class="form-control form-control-color" id="color" value="#3A5B87" title="Choose your color">                           
                        </div>
                        <div class="p-2 bd-highlight col-md-3">
                            <select class="form-select form-select-sm" aria-label="form-select-sm example" id="font_fami">
                                <option selected value="Arial">Arial </option>
                                <option value="">#</option>
                                <option value="">#</option>
                            </select>
                        </div>
                        <div class="p-2 bd-highlight col-md-3">
                            <select class="form-select form-select-sm" aria-label="form-select-sm example" id="size_font">
                                <!-- <option value="">Size Font</option> -->
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option selected value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                        </div>
                    </div>
                </div>                
                <div class="position-absolute top-50 start-50 translate-middle bg-body" style="width: 480.8px; height: 678.3px; padding: 0; vertical-align: middle; z-index: 3; background-color: white !important;margin-top: 22px">
                    <iframe class="" title="Templet" id="cv_templet" src="" seamless="seamless" scrolling="no" style="max-width: 479.8px; height: 100%;width: 100%;">
                        
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    </div>

</template>

<script>
    import axios from 'axios';

     export default {
        data () {
            return {
                pos: 8,
                progress: 8,
                message: null,
                fields: {},
                success: false,
                errors: {},
                selectedImage: null,
            }
        },
        computed: {
            imageUrl() {
                return this.fields.image_profile ? URL.createObjectURL(this.fields.image_profile) : null;
            },
            availableYears() {
                const currentYear = new Date().getFullYear();
                const years = [];

                for (let year = currentYear; year >= currentYear - 50; year--) {
                    years.push(year);
                }
                return years;
            },
        },
        methods: {
            handleImageChange(event) {
                const file = event.target.files[0];
                // You can do something with the selected file, for example, store it in the component's data
                this.fields.image_profile = file;
            },
            submit() {
                axios.post('store', this.fields).then(response => {
                    console.log(response.data);
                }).catch(error=> {
                    /* if (error.response.status == 422) {
                        console.log(error.response.data.errors);
                    } */
                    console.log(error);
                });
            },
            next(p) {
                this.pos = (this.pos + p);
                this.progress = this.pos;
            },
            back(p) {
                this.pos = (this.pos-p);
                this.progress = this.pos;
            },
            position(p) {
                this.pos = p;
                this.progress = p;
            },
            handleFileChange(event) {
                const file = event.target.files[0];
                const formData = new FormData();
                formData.append('file', file);
            },
            
        }
     }
</script>
