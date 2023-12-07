<template>
  <div>
    <div class="row mt-2">
    <div id="EDUCATION" class="cYNMV">
        <div class="" v-for="(certificate,k) in certificates" :key="k">
            <div class="fnXcmN">
                <div class="jEQib eSepnq mt-2">
                    <span class="ignblp showetu"> {{ certificate.date_obtaining +" "+ certificate.name+', '+certificate.Specialty_name+', '+certificate.institute_name  }}</span>
                    <div v-show="k || ( !k && certificates.length > 1)" class="bfNMLE" >
                        <button type="button" @click="remove(k)" class="btn" style="padding: 5px;">
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
                            <input v-model="certificate.name" name="certificate[]" class= "form-control" pattern="^[a-zA-Z0-9 -+]{3,30}$" >
                            <span style="color:red;"></span>
                        </div>
                        <div class="col-md-6 py-1">
                            <label class="labels">Institution Name</label>
                            <input v-model="certificate.institute_name" name="institute_name[]" class= "form-control inst_name" pattern="^[a-zA-Z0-9 -]{3,30}$">
                            <span style="color:red;"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 py-1">
                            <label class="labels">Specialty</label>
                            <input v-model="certificate.Specialty_name" name="Specialty_name[]" class = "form-control specialty" pattern="^[a-zA-Z0-9 -]{3,30}$">
                            <span style="color:red;"></span>
                        </div>
                        <div class="col-md-6 py-1">
                            <label class="labels">Date Obtaining</label>
                            <select v-model="certificate.date_obtaining" name="date_obtaining[]" class= "form-control">
                                <option v-for="year in availableYears" :key="year" :value="year">{{ year }}</option>
                            </select>
                            <span style="color:red;"></span>
                        </div>
                    </div>
                    <div class="col-md-12 py-1">
                        <label class="labels">Description</label>
                        <textarea v-model="certificate.description" name="description[]"  maxlength="130" class ="form-control other_info"></textarea>
                        <span style="color:red;"></span>
                    </div>
                </div>
            </div>
            <div class="gAWxhx cFgtZv border-top mt-2" v-show="k == certificates.length-1" id="addEtu">
                <button @click="add_certificate(k)" type="button" class="btn mt-2" data-bs-toggle="button">
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

<div class="row">
    <div id="Experience" class="cYNMV">
      <div class="" v-for="(experience,k) in experiences" :key="k">
            <div class="fnXcmN">
              <div class="jEQib eSepnq mt-2">
                    <span class="ignblp showetu"> {{ experience.date_obtaining +" "+ experience.name+', '+experience.Specialty_name+', '+experience.institute_name  }}</span>
                    <div v-show="k || ( !k && certificates.length > 1)" class="bfNMLE" >
                        <button type="button" @click="remove(k)" class="btn" style="padding: 5px;">
                            <ion-icon style="color: var(--bs-gray-500);" size="small" src="/icons/close-circle-outline.svg"></ion-icon>
                        </button>
                        <button type="button" @click="toggle(k)" class="btn" style="padding: 5px;">
                            <ion-icon size="" style="color: var(--bs-gray-500);" :class="{ 'chevron-up md hydrated': experience.show, 'chevron-down md hydrated': !experience.show }"></ion-icon>
                        </button>
                    </div>
                </div>
                <div :class="{ 'slide-up': !experience.show, 'slide-down': experience.show && experience.length > 0 }">
                    <div class="row py-2">
                        <div class="col-md-6 py-1" >
                            <label class="labels">Job post</label>
                            <input v-model="experience.name_post" name="post[]" class="form-control">
                            <span style="color:red;"></span>
                        </div>
                        <div class="col-md-6 py-1">
                            <label class="labels">Company name or Institution Name</label>
                            <input v-model="experience.name_company" name="institution[]" class="form-control">
                            <span style="color:red;"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 py-1">
                            <label class="labels">Start date </label>
                            <input v-model="experience.start_date" type="month" min="1970-01" name="startdate[]" class = "form-control">
                            <span style="color:red;"></span>
                        </div>
                        <div class="col-md-4 py-1">
                            <label class="labels">End date</label>
                            <input v-model="experience.end_date" type="month" min="1970-01" name="enddate[]" class = "form-control">
                            <span style="color:red;"></span>
                        </div>
                        <div class="col-md-4 py-1">
                            <label class="labels">City</label>
                            <input v-model="experience.city" name="city_exp[]" class = "form-control" >
                            <span style="color:red;"></span>
                        </div>
                    </div>
                    <div class="col-md-12 py-1">
                        <input v-model="experience.currently_here" type="checkbox" name="currently_here[]">
                        <label class="labels" for="currently_here[]"> I currently work here</label>
                    </div>
                    <div class="col-md-12 py-1">
                        <label class="labels">Description</label>
                        <textarea v-model="experience.description" name="otherinfo[]" maxlength="120" class = "form-control"></textarea>
                        <span style="color:red;"></span>
                    </div>
                </div>   
                <div class="dxqSpv"></div>         
            </div>
        </div>
        <div class="gAWxhx cFgtZv border-top"  v-show="k == certificates.length-1" id="addexp">
          <button @click="add_experience(k)" type="button" class="btn mt-2" data-bs-toggle="button">
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

</template>

<script>
import VueSlideUpDown from 'vue3-slide-up-down';

export default {
  components: {
    VueSlideUpDown,
  },
  data() {
    return {
      certificates: [
        {
          // Certificate 1 properties
          isSlidedUp: false,
          // ... other properties
        },
        {
          // Certificate 2 properties
          isSlidedUp: false,
          // ... other properties
        },
        // ... other certificates
      ],
    };
  },
  methods: {
    remove(index) {
      // Implement remove method
    },
    toggle(index) {
      this.$set(this.certificates, index, {
        ...this.certificates[index],
        isSlidedUp: !this.certificates[index].isSlidedUp,
      });
    },
  },
};
</script>

