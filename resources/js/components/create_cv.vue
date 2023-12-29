<template>
    <div class="container rounded bg-white my-4 border border-2">
        <div v-if="showToast" v-html="toastContant"></div>
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
            <form @submit.prevent="submit" enctype="multipart/form-data" @input="dataToIframe">
                <div class="col-md-12 border-right content-left" style="min-height: 300px;">
                    <div class="alert alert-success" v-show="success">Your CV it is Save</div>
                    <div class="p-3 py-2">
                        <!-- *************** form 0 ****************************-->
                        <div v-show="pos == 8" id="8">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Profile</b></h4>
                            </div>
                            <h5>Please enter your profile informations</h5>
                            <span>This allows employers to know who you are.</span><br/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12 py-1">
                                        <label for="name">Name *</label>
                                        <input v-model="fields.name" type="text" name="name" class="form-control" >
                                        <span v-if="errors && errors['fields.name']" style="color: red;">{{ errors['fields.name'][0] }}</span>
                                    </div>
                                    <div class="col-md-12 py-1">
                                        <label for="lastName">Last Name *</label>
                                        <input v-model="fields.lastName" type="text" id="lastName" name="lastname" class="form-control" >
                                        <span style="color: red;" v-if="errors && errors['fields.lastName']">{{ errors['fields.lastName'][0] }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">   
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <span for="image" class="border px-3 p-1 add-button">
                                            Chosse Image
                                            <!-- <input type="file" id="image" @change="handleImageChange" accept="image/*"> -->
                                            <input @change="handleFileChange" type="file"  class="form-control form-control-sm" accept=".png, .jpg, .jpeg" >
                                        </span>
                                        <div v-if="fields.image_profile || cv.profile != null && cv.profile.image_profile != null">
                                            <img  class="img-thumbnail" width="125" :src="imageUrl || '/upload/images/'+cv.profile.image_profile" alt="Image Principale" >
                                        </div>
                                        <span style="color: red;" v-if="errors && errors['fields.image_profile']">{{ errors['fields.image_profile'][0] }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 py-1">
                                    <label for="date_birth">Date Birth *</label>
                                    <input v-model="fields.date_birth" type="date" id="date_birth" name="date_birth" min="{{ date('Y-m-d', strtotime('-60 years'))}}" max="{{ date('Y-m-d', strtotime('-15 years'))}}" class="form-control" >
                                    <span v-if="errors && errors['fields.date_birth']" style="color:red;">{{errors['fields.date_birth'][0]}}</span>
                                </div>
                                
                                <div class="col-md-6 py-1">
                                    <label for="">Gender *</label>
                                    <div class="row" style="padding: 4px 15px;">
                                        <div class="col-md-5">
                                        <!-- onchange="change(event)" -->
                                            <label for="M" class="form-check-label">
                                                <input v-model="fields.gender" name="fields.gender" type="radio" class="form-check-input" checked value="male">&emsp;<label for="M"> Male</label>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="F" class="form-check-label">
                                                <input v-model="fields.gender" name="fields.gender" type="radio" id="F" class="form-check-input" value="female">&emsp;<label for="F"> Female</label>
                                            </label>
                                        </div>
                                    </div>
                                    <span v-if="errors && errors['fields.gender']" style="color: red;">{{errors['fields.gender'][0]}}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 py-1">
                                    <label for="country">Country *</label>
                                    <select v-model="fields.country" class="form-select" id="country" aria-label="Default select example">
                                        <option selected></option>
                                        <option v-for="country in countries" :key="country" :value="country">
                                            {{ country }}
                                        </option>
                                    </select>
                                    <span v-if="errors && errors['fields.country']" style="color: red;">{{ errors['fields.country'][0] }}</span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 py-1">
                                    <label for="hobbies">Hobbies </label>
                                    <input v-model="fields.hobbies" type="text" id="hobbies" name="hobbies" class="form-control" placeholder="for exmple: Sport, Cinema, Cooking, Music">
                                    <span  v-if="errors && errors['fields.hobbies']" style="color: red;">{{ errors['fields.hobbies'][0] }}</span>
                                </div>
                                <div class="col-md-6 py-1">
                                    <label for="hobbies">Title profile </label>
                                    <input v-model="fields.title" type="text" id="title" name="title" class="form-control" placeholder="for exmple: Developer, Accountant" >
                                    <span v-if="errors && errors['fields.title']" style="color: red;">{{ errors['fields.title'][0] }}</span>
                                </div>
                            </div>
                            
                            <div class="form-group py-1">
                                <label for="my_profile">Profile</label>
                                <textarea v-model="fields.my_profile" type="text" id="my_profile" name="my_profile" class="form-control" placeholder="talk about your self" rows="2"></textarea>
                                <span v-if="errors && errors['fields.my_profile']" style="color: red;">{{ errors['fields.my_profile'][0] }}</span>
                            </div>
                        </div> 

                        <!-- *************** form 1 ****************************-->
                        <div v-show="pos == 22" id="22">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Contact</b></h4>
                            </div>
                            <h5>Please enter your contact informations</h5>
                            <span>This allows employers to contact you.</span>
                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <label class="labels">Address</label>
                                    <input v-model="fields.address" id="address" type="text" name="address" class="form-control contact" pattern="^[a-zA-Z0-9 -+°]{5,60}">
                                    <span style="color:red;" v-if="errors && errors['fields.address']">{{ errors['fields.address'][0] }}</span>
                                </div>
                                <div class="col-md-6 py-2">"
                                    <label class="labels">City</label>
                                    <input v-model="fields.city" type="text" id="Adcity" name="city" class="form-control contact" pattern="^[a-zA-Z ]{3,20}" minlength="3" maxlength="20">
                                    <span style="color:red;" v-if="errors && errors['fields.city']">{{ errors['fields.city'][0] }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 py-1">
                                    <label class="labels">Phone 1</label>
                                    <input v-model="fields.phone1" type="text" id="phone1" name="phone1" class="form-control contact" pattern="^[0-9 ()-,+]{10,13}$" minlength="10" maxlength="13">
                                    <span style="color:red;" v-if="errors && errors['fields.phone1']">{{ errors['fields.phone1'][0] }}</span>
                                </div>
                                <div class="col-md-6 py-1">
                                    <label class="labels">Phone 2</label>
                                    <input v-model="fields.phone2" type="text" id="phone2" name="phone2" class="form-control contact" pattern="^[0-9 ()-,+]{10,13}$" minlength="10" maxlength="13">
                                    <span style="color:red;" v-if="errors && errors['fields.phone2']">{{ errors['fields.phone2'][0] }}</span>
                                </div>
                            </div>
                            <div class="col-md-12 py-1">
                                <label class="labels">Email</label>
                                <input v-model="fields.email" type="text" id="email" name="email" class="form-control contact" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" minlength="7" maxlength="40">
                                <span style="color:red;" v-if="errors && errors['fields.email']">{{ errors['fields.email'][0] }}</span>
                            </div>
                            <div class="col-md-12 py-1">
                                <label class="labels">Linkedin</label>
                                <input v-model="fields.linkedin" type="text" id="linkedin" name="linkedin" class="form-control contact" maxlength="70" placeholder="www.linkedin.com/in/name-lastname">
                                <span style="color:red;" v-if="errors && errors['fields.linkedin']">{{ errors['fields.linkedin'][0] }}</span>
                            </div>
                        </div> 

                        <!-- *************** form 2 ****************************-->
                        <div v-show="pos == 36" id="36">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4><b>Education or Certificates</b></h4>
                            </div>
                            <h5>You have to enter data related to your studies </h5>
                            <span>Enter your last degree diploma</span>
                            <div class="row mt-2">
                                <div id="EDUCATION" class="cYNMV">
                                    <div class="" v-for="(certificate,k) in certificates" :key="k">
                                        <div class="fnXcmN">
                                            <div class="jEQib eSepnq mt-2">
                                                <span class="ignblp showetu"> {{ certificate.date_obtaining +" "+ certificate.name+', '+certificate.Specialty_name+', '+certificate.institute_name  }}</span>
                                                <div v-show="k || ( !k && certificates.length > 1)" class="bfNMLE" >
                                                    <button type="button" @click="remove_certificate(k)" class="btn" style="padding: 5px;">
                                                        <ion-icon style="color: var(--bs-gray-500);" size="small" src="/icons/close-circle-outline.svg"></ion-icon>
                                                    </button>
                                                    <button type="button" @click="toggle(k)" class="btn" style="padding: 5px;">
                                                        <ion-icon size="" style="color: var(--bs-gray-500);" :class="{ 'chevron-up md hydrated': certificate.show, 'chevron-down md hydrated': !certificate.show }"></ion-icon>
                                                    </button>
                                                </div>
                                            </div>
                                            <div :class="{ 'slide-up': !certificate.show, 'slide-down': certificate.show && certificates.length > 0 }">
                                                <div class="row py-2">
                                                    <div class="col-md-6 py-1">
                                                        <label class="labels">Certificate Name</label>
                                                        <input v-model="certificate.name" class= "form-control" pattern="^[a-zA-Z0-9 -+]{3,30}$" >
                                                        <span style="color:red;" v-if="errors && errors['certificates.' + k + '.name']">{{ errors['certificates.' + k + '.name'][0] }}</span>
                                                    </div>
                                                    <div class="col-md-6 py-1">
                                                        <label class="labels">Institution Name</label>
                                                        <input v-model="certificate.institute_name" class= "form-control inst_name" pattern="^[a-zA-Z0-9 -]{3,30}$" >
                                                        <span style="color:red;" v-if="errors && errors['certificates.' + k + '.institute_name']">{{ errors['certificates.' + k + '.institute_name'][0] }}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 py-1">
                                                        <label class="labels">Specialty</label>
                                                        <input v-model="certificate.Specialty_name" class = "form-control specialty" pattern="^[a-zA-Z0-9 -]{3,30}$" >
                                                        <span style="color:red;" v-if="errors && errors['certificates.' + k + '.Specialty_name']">{{ errors['certificates.' + k + '.Specialty_name'][0] }}</span>
                                                    </div>
                                                    <div class="col-md-6 py-1">
                                                        <label class="labels">Date Obtaining</label>
                                                        <select v-model="certificate.date_obtaining" class= "form-control" >
                                                            <option v-for="year in availableYears" :key="year" :value="year">{{ year }}</option>
                                                        </select>
                                                        <span style="color:red;" v-if="errors && errors['certificates.' + k + '.date_obtaining']">{{ errors['certificates.' + k + '.date_obtaining'][0] }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 py-1">
                                                    <label class="labels">Description</label>
                                                    <textarea v-model="certificate.description"  maxlength="400" class ="form-control other_info"></textarea>
                                                    <span style="color:red;" v-if="errors && errors['certificate.' + k + '.description']">{{ errors['certificate.' + k + '.description'][0] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gAWxhx cFgtZv border-top mt-2" v-show="k == certificates.length-1" id="addEtu">
                                            <button @click="add_certificate(k)" type="button" class="btn btn-sm mt-2" data-bs-toggle="button">
                                                <span class="fguQPT">
                                                    <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="isBodP">
                                                        <g fill-rule="nonzero"><path xmlns="http://www.w3.org/2000/svg" fill="#1688fe" fill-rule="evenodd" d="M8 0a8 8 0 110 16A8 8 0 018 0zm0 2a6 6 0 100 12A6 6 0 008 2zm1 2v3h3v2H9v3H7V9H4V7h3V4h2z"></path></g>
                                                    </svg>
                                                </span>
                                                Add new certificate
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <!-- *************** form 3 ****************************-->
                        <div v-show="pos == 50" id="50">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Work Experience or Traineeship</b></h4>
                            </div>
                            <h5>Talk about your experience</h5>
                            <span>Start with your most recent experience</span>
                            <div class="row mt-2">
                                <div id="Experience" class="cYNMV">
                                    <div class="" v-for="(experience, e) in experiences" :key="e">
                                        <div class="fnXcmN">
                                            <div class="jEQib eSepnq mt-2">
                                                <span class="ignblp showetu"> {{ experience.start_date +"-"+experience.end_date+": "+ experience.name_post+', '+experience.name_company+', '+experience.city  }}</span>
                                                <div v-show="e || ( !e && experiences.length > 1)" class="bfNMLE" >
                                                    <button type="button" @click="remove_experience(e)" class="btn" style="padding: 5px;">
                                                        <ion-icon style="color: var(--bs-gray-500);" size="small" src="/icons/close-circle-outline.svg"></ion-icon>
                                                    </button>
                                                    <button type="button" @click="toggle_exp(e)" class="btn" style="padding: 5px;">
                                                        <ion-icon size="" style="color: var(--bs-gray-500);" :class="{ 'chevron-up md hydrated': experience.show, 'chevron-down md hydrated': !experience.show }"></ion-icon>
                                                    </button>
                                                </div>
                                            </div>
                                            <div :class="{ 'slide-up': !experience.show, 'slide-down': experience.show && experience.length > 0 }">
                                                <div class="row py-2">
                                                    <div class="col-md-6 py-1" >
                                                        <label class="labels">Job post</label>
                                                        <input v-model="experience.name_post" name="post[]" class="form-control">
                                                        <span style="color:red;" v-if="errors && errors['experiences.' + e + '.name_post']">{{ errors['certificates.' + e + '.name_post'][0] }}</span>
                                                    </div>
                                                    <div class="col-md-6 py-1">
                                                        <label class="labels">Company name or Institution Name</label>
                                                        <input v-model="experience.name_company" name="institution[]" class="form-control">
                                                        <span style="color:red;" v-if="errors && errors['experiences.' + e + '.name_company']">{{ errors['certificates.' + e + '.name_company'][0] }}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 py-1">
                                                        <label class="labels">Start date </label>
                                                        <input v-model="experience.start_date" type="month" min="1970-01" name="startdate[]" class = "form-control">
                                                        <span style="color:red;" v-if="errors && errors['experiences.' + e + '.name_company']">{{ errors['certificates.' + e + '.name_company'][0] }}</span>
                                                    </div>
                                                    <div class="col-md-4 py-1" v-if="!experience.currently_here">
                                                        <label class="labels">End date</label>
                                                        <input v-model="experience.end_date" type="month" min="1970-01" name="enddate[]" class = "form-control">
                                                        <span style="color:red;" v-if="errors && errors['experiences.' + e + '.name_company']">{{ errors['certificates.' + e + '.name_company'][0] }}</span>
                                                    </div>
                                                    <div class="col-md-4 py-1">
                                                        <label class="labels">City</label>
                                                        <input v-model="experience.city" name="city_exp[]" class = "form-control" >
                                                        <span style="color:red;" v-if="errors && errors['experiences.' + e + '.city']">{{ errors['certificates.' + e + '.city'][0] }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 py-1">
                                                    <input v-model="experience.currently_here" :checked="experience.currently_here" @change="changecurrently_here(e)" type="checkbox" name="currently_here[]" value="0">
                                                    <label class="labels" for="currently_here[]">&emsp;I’m currently working in this role</label>
                                                </div>
                                                <div class="col-md-12 py-1">
                                                    <label class="labels">Work description</label>
                                                    <textarea v-model="experience.description" name="description[]" maxlength="400" class = "form-control"></textarea>
                                                    <span style="color:red;" v-if="errors && errors['experiences.' + e + '.description']">{{ errors['certificates.' + e + '.description'][0] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gAWxhx cFgtZv border-top"  v-show="e == experiences.length-1" id="addexp">
                                            <button @click="add_experience(e)" type="button" class="btn btn-sm mt-2" data-bs-toggle="button">
                                                <span class="fguQPT">
                                                    <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="isBodP">
                                                        <g fill-rule="nonzero"><path xmlns="http://www.w3.org/2000/svg" fill="#1688fe" fill-rule="evenodd" d="M8 0a8 8 0 110 16A8 8 0 018 0zm0 2a6 6 0 100 12A6 6 0 008 2zm1 2v3h3v2H9v3H7V9H4V7h3V4h2z"></path></g>
                                                    </svg>
                                                </span>
                                                Add new experience
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- *************** form 4 ****************************-->
                        <div v-show="pos == 64" id="64">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Skills</b></h4>
                            </div>
                            <h5>Talk about your skills that you master</h5>
                            <span>This allows employers to learn your professional skills.</span>
                            <div class="row mt-2">
                                <div id="EDUCATION" class="cYNMV">
                                    <div class="" v-for="(skill, s) in skills" :key="s">
                                        <div class="fnXcmN">
                                            <div class="jEQib eSepnq">
                                                <span class="ignblp showetu"> {{ skill.name +" : "+skill.level }}</span>
                                                <div v-show="s || ( !s && skills.length > 1)" class="bfNMLE" >
                                                    <button type="button" @click="remove_skill(s)" class="btn" style="padding: 5px;">
                                                        <ion-icon style="color: var(--bs-gray-500);" size="small" src="/icons/close-circle-outline.svg"></ion-icon>
                                                    </button>
                                                    <button type="button" @click="toggle_skill(s)" class="btn" style="padding: 5px;">
                                                        <ion-icon size="" style="color: var(--bs-gray-500);" :class="{ 'chevron-up md hydrated': skill.show, 'chevron-down md hydrated': !skill.show }"></ion-icon>
                                                    </button>
                                                </div>
                                            </div>
                                            <div :class="{ 'slide-up': !skill.show, 'slide-down': skill.show && skills.length > 0 }">
                                                <div class="row py-2">
                                                    <div class="col-md-6 py-1">
                                                        <label class="labels">Skill</label>
                                                        <input v-model="skill.name" class="form-control" >
                                                        <span style="color:red;" v-if="errors && errors['skills.' + e + '.name']">{{ errors['certificates.' + s + '.name'][0] }}</span>
                                                    </div>
                                                    <div class="col-md-6 py-1">
                                                        <label for="level" class="col-md-12">Level</label>
                                                        <div class="row py-1 flex-nowrap">
                                                            <input v-model="skill.level" type="hidden" name="level_skills[]" class="form-control" >
                                                            <input v-model="skill.levelIndex" @change="updateSkillLevel(s)" type="range" style="width:57%;padding-left: 20px;" size="1" class="form-range" min="0" max="4" step="1">
                                                            <span class="col-md-5" id="show-sk-lev">{{ skill.level }}</span>
                                                        </div>
                                                        <span style="color:red;" v-if="errors && errors['skills.' + e + '.level']">{{ errors['certificates.' + s + '.level'][0] }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gAWxhx cFgtZv border-top" v-show="s == skills.length-1" id="addexp">
                                            <button @click="add_skill(s)" type="button" class="btn btn-sm mt-1" data-bs-toggle="button">
                                                <span class="fguQPT">
                                                    <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="isBodP">
                                                        <g fill-rule="nonzero"><path xmlns="http://www.w3.org/2000/svg" fill="#1688fe" fill-rule="evenodd" d="M8 0a8 8 0 110 16A8 8 0 018 0zm0 2a6 6 0 100 12A6 6 0 008 2zm1 2v3h3v2H9v3H7V9H4V7h3V4h2z"></path></g>
                                                    </svg>
                                                </span>
                                                Add new skill
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- *************** form 5 ****************************-->
                        <div v-show="pos == 78" id="78">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Languages</b></h4>
                            </div>
                            <h5>Languages that you master</h5>
                            <span>This allows employers to learn about your language skills.</span>
                            <div class="row mt-2">
                                <div id="EDUCATION" class="cYNMV">
                                    <div class="" v-for="(language, l) in languages" :key="l">
                                        <div class="fnXcmN">
                                            <div class="jEQib eSepnq">
                                                <span class="ignblp showetu"> {{ language.name +" : "+language.level }}</span>
                                                <div v-show="l || ( !l && languages.length > 1)" class="bfNMLE" >
                                                    <button type="button" @click="remove_lang(l)" class="btn" style="padding: 5px;">
                                                        <ion-icon style="color: var(--bs-gray-500);" size="small" src="/icons/close-circle-outline.svg"></ion-icon>
                                                    </button>
                                                    <button type="button" @click="toggle_lang(l)" class="btn" style="padding: 5px;">
                                                        <ion-icon size="" style="color: var(--bs-gray-500);" :class="{ 'chevron-up md hydrated': language.show, 'chevron-down md hydrated': !language.show }"></ion-icon>
                                                    </button>
                                                </div>
                                            </div>
                                            <div :class="{ 'slide-up': !language.show, 'slide-down': language.show && languages.length > 0 }">
                                                <div class="row py-2">
                                                    <div class="col-md-6 py-1">
                                                        <label class="labels">Langue</label>
                                                        <input v-model="language.name" name="language[]" class="form-control" >
                                                        <span style="color:red;" v-if="errors && errors['languages.' + l + '.name']">{{ errors['languages.' + s + '.name'][0] }}</span>
                                                    </div>
                                                    <div class="col-md-6 py-1"><label for="level" class="col-md-12">Level</label>
                                                        <div class="row py-1 flex-nowrap">
                                                            <input v-model="language.level" type="hidden" name="level_lang[]" class="form-control" >
                                                            <input v-model="language.levelIndex" @input="updateLanguageLevel(l)" type="range" style="width:57%;padding-left: 20px;"  size="1" class="form-range" min="0" max="4" step="1">
                                                            <span class="col-md-5" id="">{{ language.level }}</span>
                                                        </div> 
                                                        <span style="color:red;" v-if="errors && errors['languages.' + e + '.level']">{{ errors['languages.' + s + '.name'][0] }}</span>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gAWxhx cFgtZv border-top"  v-show="l == languages.length-1" id="addexp">
                                            <button @click="add_language(l)" type="button" class="btn btn-sm mt-2" data-bs-toggle="button">
                                                <span class="fguQPT">
                                                    <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="isBodP">
                                                        <g fill-rule="nonzero"><path xmlns="http://www.w3.org/2000/svg" fill="#1688fe" fill-rule="evenodd" d="M8 0a8 8 0 110 16A8 8 0 018 0zm0 2a6 6 0 100 12A6 6 0 008 2zm1 2v3h3v2H9v3H7V9H4V7h3V4h2z"></path></g>
                                                    </svg>
                                                </span>
                                                Add new langue
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- *************** form 6 ****************************-->
                        <div v-show="pos == 92" id="92">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Finish</b></h4>
                            </div>
                            <div v-if="sub_succes" class="alert alert-success" role="alert">
                                CV has been successfully submitted!
                            </div>
                            <span style="color: red" v-for="(error, er) in errors" :key="er"> {{ error[0] }}</span>
                        </div>
                    </div>
                </div>
                <div class="footer-bass mt-4 justify-content-between">
                    <div v-if="pos > 8" class="div-back-btn">
                        <div class="btn-back btn float-start" id="back_btn" @click="back(14)">❮ Go Back</div>
                    </div>
                    <div v-if="pos == 92" style="text-align-last: center;">
                        <button :disabled="sub" type="submit" id="save-btn" class="btn-next btn btn-primary">
                            <div v-if="sub" style="width:16; height:16" class="spinner-border text-light" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            Save 
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
                            <select v-model="template.temp" @change="design_template" class="form-select form-select-sm" aria-label="form-select-sm example" id="templet">
                                <option selected value="t1">Model 1 </option>
                                <option value="t2">Model 2</option>
                            </select>
                        </div>
                        <div class="p-1 bd-highlight" style="display: inline-flex;" >
                            <!-- <label for="ColorInput" class="form-label">Color picker </label> -->
                            <input v-model="template.color" @input="design_template" type="color" class="form-control form-control-color"  id="color"  title="Choose your color">                           
                        </div>
                        <div class="p-2 bd-highlight col-md-3">
                            <select @change="design_template" v-model="template.font_fami" class="form-select form-select-sm" aria-label="form-select-sm example" id="font_fami">
                                <option selected value="Arial">Arial </option>
                                <option value="">#</option>
                                <option value="">#</option>
                            </select>
                        </div>
                        <div class="p-2 bd-highlight col-md-3">
                            <select @change="design_template" v-model="template.size_font" class="form-select form-select-sm" aria-label="form-select-sm example" id="size_font">
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
                    <iframe refs="myIframe" class="" title="Templet" id="cv_templet" :src="'/template/'+template.temp" seamless="seamless" scrolling="no" style="max-width: 479.8px; height: 100%;width: 100%;">
                        
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    </div>

</template>

<script>
    import axios from 'axios';
    //const ti = cv.title;
    
    export default {
        data () {
            return {
                cv: cv,
                template: {
                    temp: 't1',
                    color: '#3a5b87',
                    font_fami: 'Arial',
                    size_font: 'M',
                },
                countries: [],
                pos: 8,
                progress: 8,
                message: null,
                fields: {
                    id: cv.id,
                    image_profile: "",
                    gender: 'male',
                    country: null,
                    my_profile: "",
                    hobbies: "",
                },
                success: false,
                errors: {},
                selectedImage: null,
                certificates: [{
                    name: '',
                    institute_name: '',
                    Specialty_name: '',
                    date_obtaining: '',
                    description: '',
                    show: true,
                }],
                experiences: [{
                    name_post: '',
                    name_company: '',
                    start_date: '',
                    end_date: '',
                    city: '',
                    description: '',
                    currently_here: false,
                    show: true,
                }],
                skills: [{
                    name: '',
                    level: 'Beginner',
                    levelIndex: 0,
                    show: true,
                }],
                languages: [{
                    name: '',
                    level: 'Beginner',
                    levelIndex: 0,
                    show: true,
                }],
                level: ["Beginner","Moderate","Good","Very good","Fluent"],
                errors: true,
                showToast: false,
                toastContant: '',
                sub: false,
                sub_succes: false,
            }
        },
        methods: {  
            add_certificate(obj = {}) {
                this.disable_all_cert();
                this.certificates.push({
                    name: obj.certificate ? obj.certificate : '',
                    institute_name: obj.institute_name ? obj.institute_name : '',
                    Specialty_name: obj.Specialty_name ? obj.Specialty_name : '',
                    date_obtaining: obj.date_obtaining ? obj.date_obtaining : '',
                    description: obj.description ? obj.description : '',
                    show: true,
                })
            },
            remove_certificate (index) {
                this.certificates.splice(index, 1);
                if(this.certificates.length == 1)
                    this.certificates[0].show = true;
            },
            toggle(index) {
                this.disable_all_cert(index);
                this.certificates[index].show = !this.certificates[index].show;
            },
            disable_all_cert(index = {}){
                for (let i = 0; i < this.certificates.length; i++) {
                    if (typeof index === 'number') {
                        if (index !== i)
                            this.certificates[i].show = false;
                    } else {
                        // Disable all certificates if no index provided
                        this.certificates[i].show = false;
                    }
                }
            },
            /********* experiences ************ */
            add_experience(obj = {}) {
                this.disable_all_exp();
                this.experiences.push({
                    name_post: obj.name_post ? obj.name_post : '',
                    name_company: obj.name_company ? obj.name_company : '',
                    start_date: obj.start_date ? obj.start_date : '',
                    end_date: obj.end_date ? obj.end_date : '',
                    city: obj.city ? obj.city : '',
                    description: obj.description ? obj.description : '',
                    currently_here: obj.currently_here ? true : false,
                    show: true,
                });
            },
            remove_experience (index) {
                this.experiences.splice(index, 1);
                if(this.experiences.length == 1)
                    this.experiences[0].show = true;
            },
            toggle_exp (index) {
                this.disable_all_exp(index);
                this.experiences[index].show = !this.experiences[index].show;
            },
            disable_all_exp(index = {}){
                for (let i = 0; i < this.experiences.length; i++) {
                    if (typeof index === 'number') {
                        if (index !== i)
                            this.experiences[i].show = false;
                    } else {
                        // Disable all certificates if no index provided
                        this.experiences[i].show = false;
                    }
                }
            },
            changecurrently_here(index){
                this.experiences[index].end_date = '';
            },
            /********* skills ************ */
            add_skill(obj = {}) {
                this.disable_all_skills();
                this.skills.push({
                    name: obj.name ? obj.name : '',
                    level: obj.level ? obj.level : '',
                    levelIndex: this.level.indexOf(obj.level) ? this.level.indexOf(obj.level) : '',
                    show: true,
                });
            },
            remove_skill (index) {
                this.skills.splice(index, 1);
                if(this.skills.length == 1)
                    this.skills[0].show = true;
            },

            toggle_skill (index) {
                this.disable_all_skills(index);
                this.skills[index].show = !this.skills[index].show;
            },
            disable_all_skills(index = {}){
                for (let i = 0; i < this.skills.length; i++) {
                    if (typeof index === 'number') {
                        if (index !== i)
                            this.skills[i].show = false;
                    } else {
                        // Disable all certificates if no index provided
                        this.skills[i].show = false;
                    }
                }
            },
            updateSkillLevel(index) {
                // Update skill.level based on the level index
                this.skills[index].level = this.level[this.skills[index].levelIndex];
            },

            /********* languges ************ */
            add_language (obj = {}) {
                this.disable_all_languages();
                this.languages.push({
                    name: '' || obj.language_name,
                    level: '' || obj.level,
                    levelIndex: 0 || this.level.indexOf(obj.level),
                    show: true,
                });
            },
            remove_lang (index) {
                this.languages.splice(index, 1);
                if(this.languages.length == 1)
                    this.languages[0].show = true;
            },
            toggle_lang (index) {
                this.disable_all_languages(index);
                this.languages[index].show = !this.languages[index].show;
            },
            disable_all_languages(index = {}){
                for (let i = 0; i < this.languages.length; i++) {
                    if (typeof index === 'number') {
                        if (index !== i)
                            this.languages[i].show = false;
                    } else {
                        // Disable all certificates if no index provided
                        this.languages[i].show = false;
                    }
                }
            },
            updateLanguageLevel(index) {
                // Update language.level based on the level index
                this.languages[index].level = this.level[this.languages[index].levelIndex];
            },
                        
            /*************************** */
            handleFileChange(event) {
                this.fields.image_profile = event.target.files[0] || null;
            },
            submit() {
                this.sub = true;
                this.errors = false;
                this.sub_succes = false;

                // Create FormData
                const formData = new FormData();
                
                // Append fields data
                for (let key in this.fields) {
                    formData.append(`fields[${key}]`, this.fields[key]);
                }
                
                // Append certificates data
                this.certificates.forEach((certificate, index) => {
                    for (let key in certificate) {
                        formData.append(`certificates[${index}][${key}]`, certificate[key]);
                    }
                });

                // Append experiences data
                this.experiences.forEach((experience, index) => {
                    for (let key in experience) {
                        formData.append(`experiences[${index}][${key}]`, experience[key]);
                    }
                });

                // Append experiences data
                this.skills.forEach((skill, index) => {
                    for (let key in skill) {
                        formData.append(`skills[${index}][${key}]`, skill[key]);
                    }
                });

                // Append experiences data
                this.languages.forEach((language, index) => {
                    for (let key in language) {
                        formData.append(`languages[${index}][${key}]`, language[key]);
                    }
                });

                for (let key in this.template) {
                    formData.append(`template[${key}]`, this.template[key]);
                }

                axios.post('/cv/store', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                })
                .then(response => {
                    // Handle success
                    //console.log(response.data);
                    const successMessage = response.data.success; // Assuming the success message is returned from the server
                    console.log(response.data);
                    if (successMessage) {
                        this.sub = false;                     
                        this.toastContant = `<div class="toast-container p-3 top-1 start-50 translate-middle-x" >
                            <div class="toast align-items-center text-bg-success border-0 fade show" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="d-flex">
                                    <div class="toast-body">
                                        CV has been successfully submitted!
                                    </div>
                                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>`;
                        this.showToast = true;
                        this.sub_succes = true;
                        //parent.append(el);

                        // Redirect to home after a successful submission
                        //this.$router.push('/home');  // Replace 'home' with the name of your home route
                    }
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        // Validation error
                        this.errors = error.response.data.errors;
                        console.table(this.errors);
                    } else {
                        // Other error (server error, etc.)
                        console.error(error);
                    }
                    this.sub = false;
                });
            },
            next(p) {
                this.pos = (this.pos + p);
                this.progress = this.pos;
                this.datatosvg;
            },
            back(p) {
                this.pos = (this.pos-p);
                this.progress = this.pos;
            },
            position(p) {
                this.pos = p;
                this.progress = p;
            },

            dataToIframe(){
                //var cv = this.fields;
                try{
                    const iframe = document.getElementById("cv_templet").contentDocument;
                    //image
                    if(this.fields.image_profile){
                        var imagPro = iframe.getElementById("imagPro");  
                        imagPro.src = this.imageUrl;
                    }
                    else if (cv.profile.image_profile){
                        var imagPro = iframe.getElementById("imagPro");  
                        imagPro.src = '/Upload/images/'+cv.profile.image_profile;
                    }
                    if(this.fields.image_profile){iframe.getElementById("cader-imag").hidden=false;}
                    //img_svg.prop('hidden', false);
                    iframe.getElementById("tit").textContent = this.fields.title;
                    iframe.getElementById("fullName").textContent = this.fields.name +" "+ this.fields.lastName;
                    iframe.getElementById("email").textContent = this.fields.email;
                    var ph2="";if(this.fields.phone2) ph2=' / '+ this.fields.phone2;
                    iframe.getElementById("tel").textContent = this.fields.phone1+ ph2;
                    iframe.getElementById("address").textContent = this.fields.address;
                    iframe.getElementById("linkedin").textContent = this.fields.linkedin;
                    iframe.getElementById("Profile").textContent = this.fields.my_profile;
                    
                    //var secEdu = iframe.getElementById('secEdu');
                    var count=0;
                    $.each(this.certificates, function(key, value){
                        if(count==0)$('#cv_templet').contents().find('#secEdu').html("");;
                        var sedu = `<div class="item"><div class="meta"><div class="upper-row"><h2 class="job-title">`+this.name+` `+this.Specialty_name+`</h2></div><div class="upper-row d-flex justify-content-between"><div class="col-xs-7 compa">`+this.institute_name+`</div><div class="col-xs-5 date">`+this.date_obtaining+`</div></div></div><div class="text-wrap"><p>`+this.description+`</p></div></div>`;
                        $('#cv_templet').contents().find('#secEdu').append(sedu);
                        count++;
                    });

                    count=0;
                    //experience
                    $.each(this.experiences, function(key, value){
                        if(count==0)$('#cv_templet').contents().find('#secExp').html("");
                        var sedu = `<div class="item"><div class="meta"><div class="upper-row"><h3 class="job-title">`+this.name_post+`</h3></div><div class="upper-row"><div class="compa">`+this.name_company+`, `+this.city+`</div><div class="date">`+this.start_date+` - `+this.end_date+`</div></div></div><div class="text-wrap"><p>`+this.description+`</p></div></div>`;
                        $('#cv_templet').contents().find('#secExp').append(sedu);
                        count++;
                    });

                    var leval = this.level;
                    count=0;
                    var cercles ="";
                    //lang
                    $.each(this.languages, function(key, value){
                    if(count==0)$('#cv_templet').contents().find('#seclang').html("");
                        if(this.name){
                            for (let index = 0; index < leval.length; index++) {
                                if(index<=leval.indexOf(this.level))
                                    cercles +='<div class="setcolor" style="margin: 0 3px; height: 7px; width: 7px; border-radius: 50%;"></div>';
                                else
                                    cercles +='<div class="" style="margin: 0 3px; background-color: #bbbbbb;  height: 7px; width: 7px; border-radius: 50%;"></div>';
                            }
                            var sedu = `<div class="lan_lev row justify-content-between align-items-center"><div class="col-6"><span class="lang">`+this.name+`</span></div> <div class="col-6 d-flex justify-content-around">`+cercles+`</div></div>`;
                            $('#cv_templet').contents().find('#seclang').append(sedu);
                            count++;
                            cercles="";
                        }
                    });

                    //Skills
                    count = 0;
                    $.each(this.skills, function(key, value){
                        if(count==0)$('#cv_templet').contents().find('#skillset').html("");
                        if(this.name){
                            cercles= (leval.indexOf(this.level)+1)*20;
                            var sedu = `<div class="container">
                            <div class="row justify-content-around">
                                <div class="col-6"><h6 class="level-title">`+this.name+`</h6></div>
                                <div class="col-5">
                                    <div class="progress" style="height: 10px; width: 100%; margin-top: 3px;">
                                        <div class="progress-bar setcolor" role="progressbar" style="width: `+cercles+`%;" aria-valuenow="`+cercles+`" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>`;
                            $('#cv_templet').contents().find('#skillset').append(sedu);
                            count++;
                        }
                    });

                    count = 0;
                    //hobbies
                    if(this.fields.hobbies) {
                        let hobbies = this.fields.hobbies.split(',');
                        $.each(hobbies, function(key, value){
                            if(hobbies[0]==this)
                                $('#cv_templet').contents().find('#hobbies').html("");

                            $('#cv_templet').contents().find('#hobbies').append('<li>'+this+'</li>');
                        });
                    }
                    this.$nextTick(() => {
                        this.design_template();
                    });
                }
                catch(err)
                {
                    console.log(err)
                }
            },
            design_template()
            {
                //design
                const iframe = document.getElementById("cv_templet").contentDocument;
                //chage font color cv
                var pa= iframe.getElementsByTagName("page");
                $.each(pa, function(key, value){
                    this.style.font = this.template.font;
                });
                $.each(iframe.getElementsByClassName("setcolor"), function(key, value){
                    this.style.background = $("#color").val();
                });
                $.each(iframe.getElementsByClassName("c55"), function(key, value){
                    this.style.color = $("#color").val();
                });
            },
            setImage(image) {
                return URL.createObjectURL('/upload/images/'+image);
            }
        },
        mounted() {
            try {
                if (cv.profile) {
                    this.fields.name = cv.profile.name;
                    this.fields.lastName = cv.profile.lastname;
                    this.fields.date_birth = cv.profile.date_birth;
                    this.fields.gender = cv.profile.gender;
                    this.fields.country = cv.profile.country;
                    this.fields.hobbies = cv.profile.hobbies;
                    this.fields.title = cv.title;
                    this.fields.my_profile = cv.profile.my_profile;
                    //this.files.image_profile = cv.profile.image_profile ? '/Upload/images/' + cv.profile.image_profile : null;

                    this.fields.address = cv.contact.address;
                    this.fields.city = cv.contact.city;
                    this.fields.profile = cv.contact.city;
                    this.fields.phone1 = cv.contact.phone1;
                    this.fields.phone2 = cv.contact.phone2;
                    this.fields.email = cv.contact.email;
                    this.fields.linkedin = cv.contact.linkedin ? cv.contact.linkedin : "";

                    this.certificates = [];
                    cv.certificate.forEach(obj => {
                        this.add_certificate(obj);
                    });

                    this.experiences = [];
                    cv.experience.forEach(obj => {
                        this.add_experience(obj);
                    });

                    this.skills = [];
                    cv.skill.forEach(obj => {
                        this.add_skill(obj);
                    });

                    this.languages = [];
                    cv.language.forEach(obj => {
                        this.add_language(obj);
                    });
                    
                    this.template.temp = cv.templet.name;
                    this.template.color = cv.template.color;
                    this.template.font_fami = cv.template.font_fami;
                    this.template.size_font = cv.template.size_font;

                    this.$nextTick(() => {
                        this.dataToIframe();
                    });
                }
            } catch(e) {
                console.error(e);
            }
            const iframeWindow = document.getElementById("cv_templet").contentWindow;
            if (iframeWindow) {
                iframeWindow.addEventListener("load", this.dataToIframe);
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
        async created() {
            try {
                const response = await axios.get('/countries');
                this.countries = response.data;
            } catch (error) {
                console.error('Error fetching countries:', error);
            }
        },
    }
</script>

<style scoped>
.slide-up {
  height: 0;
  overflow: hidden;
  transition: height 1s ease-in-out;
}
.slide-down {
  overflow: visible;
  transition: height 1s ease-in-out;
}

.chevron-up {
    content: url('/icons/chevron-up-outline.svg');
    color: var(--bs-gray-500);
}

.chevron-down {
    content: url('/icons/chevron-down-outline.svg');
    color: var(--bs-gray-500);
}
</style>
