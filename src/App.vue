<template>
  <div class="container">
    <div class="box form-box">
      <h1>Sing up</h1>
      <form action="" method="post">
        <div class="field input" :class="{ 'form-data-error': fullnameerr }">
          <label for="fullname"></label>
          <input
            type="text"
            name="fullname"
            id="fullname"
            placeholder="fullname"
            @input="validateFullname($event)"
            @change="validateFullname($event)"
            v-model.trim="fullname"
            required
          />
          <span class="error-feedback" v-if="fullnameerr">{{
            fullnamemsg
          }}</span>
        </div>
        <div class="field input" :class="{ 'form-data-error': usernameerr }">
          <label for="username"></label>
          <input
            type="text"
            name="username"
            id="username"
            placeholder="username"
            @input="validateUsername($event)"
            @change="validateUsername($event)"
            v-model.trim="username"
            required
          />
          <span class="error-feedback" v-if="usernameerr">{{
            usernamemsg
          }}</span>
        </div>
        <div class="field input" :class="{ 'form-data-error': emailerr }">
          <label for="email"></label>
          <input
            type="text"
            name="email"
            id="email"
            placeholder="email"
            @input="validateEmail($event)"
            @change="validateEmail($event)"
            v-model.trim="email"
            required
          />
          <span class="error-feedback" v-if="emailerr">{{ emailmsg }}</span>
        </div>
        <div class="field input" :class="{ 'form-data-error': ageerr }">
          <label for="age"></label>
          <input
            type="number"
            name="age"
            id="age"
            placeholder="age"
            min="1"
            max="99"
            @input="validateage($event)"
            @change="validateage($event)"
            v-model.trim="age"
            required
          />
          <span class="error-feedback" v-if="ageerr">{{ agemsg }}</span>
        </div>
        <div class="field input">
          <label for="gender"></label>
          <select
            name="gender"
            id="gender"
            class="input"
            required
            v-model.trim="gender"
          >
            <option value="" disabled selected hidden>gender</option>
            <option value="female">female</option>
            <option value="male">male</option>
          </select>
        </div>
        <div class="field input" :class="{ 'form-data-error': Locationerr }">
          <label for="Location"></label>
          <input
            type="text"
            name="Location"
            id="Location"
            placeholder="Location"
            v-model.trim="Location"
            required
          />
          <span class="error-feedback" v-if="Locationerr">{{
            Locationmsg
          }}</span>
        </div>
        <div class="field input">
          <label for="language"></label>
          <select
            name="language"
            id="language"
            class="input"
            required
            v-model.trim="language"
          >
            <option value="" disabled selected hidden>language</option>
            <option value="arabe">arabe</option>
            <option value="english">english</option>
            <option value="français">français</option>
          </select>
        </div>
        <div class="field input" :class="{ 'form-data-error': scripterr }">
          <label for="script"></label>
          <textarea
            name="script"
            id="script"
            cols="50"
            rows="3"
            placeholder="script about you "
            class="script"
            v-model.trim="script"
          ></textarea>
          <span class="error-feedback" v-if="scripterr">{{ scriptmsg }}</span>
        </div>
        <div
          class="field input"
          :class="{ 'form-data-error': imgprofilerr }"
          v-if="!img"
        >
          <label for="imgprofil"></label>
          <input
            type="file"
            accept="image/png, image/jpeg, image/jpg"
            name="imgprofil"
            id="imgprofil"
            @input="validateImgprofil()"
            @change="validateImgprofil()"
            @click="validateImgprofil()"
            ref="imgprofil"
            class="imgfille"
          />
          <span class="error-feedback" v-if="imgprofilerr">{{
            imgprofilmsg
          }}</span>
        </div>
        <div v-else>
          <span>Uploaded profile img </span><br />
          <img :src="img" class="w150 rounded" /><br />
          <button class="btn btn-outline-danger my-2" @click="removeimg()">
            Remove profile img
          </button>
        </div>

        <div class="field input" :class="{ 'form-data-error': passworderr }">
          <label for="password"></label>
          <input
            type="password"
            name="password"
            id="password"
            placeholder="password"
            @input="validatePassword($event)"
            @change="validatePassword($event)"
            v-model.trim="password"
            required
          />
          <span class="error-feedback" v-if="passworderr">{{
            passwordmsg
          }}</span>
        </div>
        <div class="field">
          <input
            @submit.prevent="validateForm()"
            @click.prevent="newsignup()"
            type="submit"
            name="submit"
            class="btn btn-outline-success"
            value="login Now"
          />
          <input
            @click="resetformerr()"
            type="reset"
            name="reset"
            class="btn btn-outline-primary"
            value="reset"
            style="border-color: blue; margin-top: 0.3rem"
          />
        </div>
        <div class="alert alert-success" role="alert" v-if="resultsuccess">
          {{ successmsg }}
        </div>
        <div class="alert alert-danger" role="alert" v-if="resulterr">
          {{ errmsg }}
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "SingUp",
  data() {
    return {
      fullname: "",
      fullnameerr: false,
      fullnamemsg: "",
      isfullnamevalid: false,

      username: "",
      usernameerr: false,
      usernamemsg: " ",
      isusernamevalid: false,

      email: "",
      emailerr: false,
      emailmsg: " ",
      isemailvalid: false,

      age: "",
      ageerr: false,
      agemsg: " ",
      isagevalid: false,

      gender: "",

      Location: "",
      Locationerr: false,
      Locationmsg: "",
      isLocationvalid: false,

      language: "",

      script: "",
      scripterr: false,
      scriptmsg: "",
      isscriptvalid: false,

      imgprofil: "",
      imgprofilerr: false,
      imgprofilmsg: "",
      isimgprofilvalid: false,
      img: "",

      password: "",
      passworderr: false,
      passwordmsg: "",
      ispasswordvalid: false,

      resulterr: false,
      errmsg: "",
      resultsuccess: false,
      successmsg: "",
    };
  },
  mounted() {
    //console.log(this.$refs.imgprofil.files[0]);
  },
  methods: {
    validateUsername(a) {
      let val = a.target.value;
      this.validateUsernameinput(val);
    },
    validateUsernameinput(val) {
      if (val == "") {
        this.usernameerr = true;
        this.isfullnamevalid = false;
        this.usernamemsg = "must enter username";
      } else {
        if (!/^[a-zA-Z0-9]+$/.test(val)) {
          this.usernameerr = true;
          this.isusernamevalid = false;
          this.usernamemsg =
            "Le nom d'utilisateur ne peut contenir que des lettres et des chiffres.";
        } else {
          this.usernameerr = false;
          this.isusernamevalid = true;
          this.usernamemsg = "";
        }
      }
    },
    validateFullname(a) {
      let val = a.target.value;
      this.validateFullnameinput(val);
    },
    validateFullnameinput(val) {
      if (val == "") {
        this.fullnameerr = true;
        this.isfullnamevalid = false;
        this.fullnamemsg = "must enter fullname";
      } else {
        if (!/^[a-zA-Z]+( [a-zA-Z]+)*$/.test(val)) {
          this.fullnameerr = true;
          this.isfullnamevalid = false;
          this.fullnamemsg = "Le nom complet ne peut contenir que des lettres.";
        } else {
          this.fullnameerr = false;
          this.isfullnamevalid = true;
          this.fullnamemsg = "";
        }
      }
    },
    validateEmail(a) {
      let val = a.target.value;
      this.validateEmailinput(val);
    },
    validateEmailinput(val) {
      if (val == "") {
        this.emailerr = true;
        this.isemailvalid = false;
        this.emailmsg = "must enter email adress";
      } else {
        if (!/^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(val)) {
          this.emailerr = true;
          this.isemailvalid = false;
          this.emailmsg = "L'adresse e-mail n'est pas valide.";
        } else {
          this.emailerr = false;
          this.isemailvalid = true;
          this.emailmsg = "";
        }
      }
    },
    validateage(a) {
      let val = a.target.value;
      this.validateAgeinput(val);
    },
    validateAgeinput(val) {
      if (val == "") {
        this.ageerr = true;
        this.isagevalid = false;
        this.agemsg = "must enter age";
      } else {
        if (val != "" && isNaN(val)) {
          this.ageerr = true;
          this.isagevalid = false;
          this.agemsg = "age has to be number";
        } else {
          if (val < 0) {
            this.ageerr = true;
            this.isagevalid = false;
            this.agemsg = "age can not be negative";
          } else {
            if (val == 0 || val === 0.0) {
              this.ageerr = true;
              this.isagevalid = false;
              this.agemsg = "age can not be 0";
            } else {
              if (val < 14) {
                this.ageerr = true;
                this.isagevalid = false;
                this.agemsg =
                  "Vous devez avoir au moins 14 ans pour vous inscrire.";
              } else {
                this.ageerr = false;
                this.isagevalid = true;
                this.agemsg = "";
              }
            }
          }
        }
      }
    },
    validateFileExtension(id) {
      let fileInput = document.getElementById(id);
      let filePath = fileInput.value;

      let allowExtenssions = /(\.jpg|\.png|\.jpeg|\.gif)$/i;
      if (!allowExtenssions.exec(filePath)) {
        return false;
      } else {
        return true;
      }
    },
    creatImg(file) {
      new Image();
      let reader = new FileReader();
      reader.onload = (e) => {
        this.img = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    removeimg() {
      this.img = "";
      setTimeout(() => {
        this.validateImgprofil();
      }, 500);
    },
    validateImgprofil() {
      if (this.$refs.imgprofil.files[0]) {
        if (this.validateFileExtension("imgprofil") == true) {
          this.imgprofilerr = false;
          this.isimgprofilvalid = true;
          this.imgprofilmsg = "";
          this.creatImg(this.$refs.imgprofil.files[0]);
          this.imgprofil = this.$refs.imgprofil.files[0];
        } else {
          this.imgprofilerr = true;
          this.isimgprofilvalid = false;
          this.imgprofilmsg = "profil img has be : PNG, JPEG, JPG, GIF";
        }
      } else {
        this.imgprofilerr = true;
        this.isimgprofilvalid = false;
        this.imgprofilmsg = "add your imgprofile";
      }
    },
    validatePassword(a) {
      let val = a.target.value;
      this.validatePasswordinput(val);
    },
    validatePasswordinput(val) {
      if (val == "") {
        this.passworderr = true;
        this.ispasswordvalid = false;
        this.passwordmsg = "must enter password";
      } else {
        if (
          !/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[a-zA-Z0-9\W_]{8,}$/.test(
            val
          )
        ) {
          this.passworderr = true;
          this.ispasswordvalid = false;
          this.passwordmsg =
            "Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule, un chiffre et un caractère spécial.";
        } else {
          this.passworderr = false;
          this.ispasswordvalid = true;
          this.passwordmsg = "";
        }
      }
    },
    validateForm() {
      if (
        !this.validateUsername() ||
        !this.validateFullname() ||
        !this.validateEmail() ||
        !this.validateAge() ||
        !this.validatePassword()
      ) {
        return false;
      }

      // Envoyer le formulaire au serveur PHP
      console.log("validated successfully");
      this.submitForm();
      return true;
    },
    async newsignup() {
      if (
        this.isfullnamevalid &&
        this.isusernamevalid &&
        this.isemailvalid &&
        this.isagevalid &&
        this.isimgprofilvalid &&
        this.ispasswordvalid
      ) {
        console.log("validated successfully");

        let fd = new FormData();
        fd.append("fullname", this.fullname);
        fd.append("username", this.username);
        fd.append("email", this.email);
        fd.append("age", this.age);
        fd.append("gender", this.gender);
        fd.append("Location", this.Location);
        fd.append("language", this.language);
        fd.append("script", this.script);
        fd.append("imgprofil", this.imgprofil);
        fd.append("password", this.password);

        let rst = await axios.post(
          `http://localhost/test-vue/src/phpcnt.php?action=update`,
          fd
        );
        console.log(rst);
        const resultData = rst.data;
        if (rst.status == 200) {
          if (rst.data.error) {
            this.resulterr = true;
            this.errmsg = resultData.message;
            this.resultsuccess = false;
            this.successmsg = "";
          } else {
            //if evrything is okay
            this.resultsuccess = true;
            this.successmsg = resultData.message;
            this.resulterr = false;
            this.errmsg = "";
            setTimeout(() => {
              window.location.href =
                "http://localhost/test-vue/public/sdfg/login.php";
            }, 2000);
          }
        }

        /* for (let pair of fd.entries()) {
          console.log(pair[0] + "," + pair[1]);
        }

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost:8080/", true);
        xhr.send(fd);*/
      } else {
        console.log("failde validating form");
        this.resulterr = true;
        this.errmsg = "failde validating form";
        this.validateUsernameinput(this.username);
        this.validateFullnameinput(this.fullname);
        this.validateEmailinput(this.email);
        this.validateAgeinput(this.age);

        this.validatePasswordinput(this.password);
      }
    },
    resetformerr() {
      this.fullnameerr = false;
      this.fullnamemsg = "";
      this.usernameerr = false;
      this.usernamemsg = " ";
      this.emailerr = false;
      this.emailmsg = " ";
      this.ageerr = false;
      this.agemsg = " ";
      this.gender = "";
      this.Locationerr = false;
      this.Locationmsg = "";
      this.language = "";
      this.scripterr = false;
      this.scriptmsg = "";
      this.imgprofilerr = false;
      this.imgprofilmsg = "";
      this.passworderr = false;
      this.passwordmsg = "";
      this.resulterr = false;
      this.errmsg = "";
      this.img = "";
    },
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&family=Poppins:ital,wght@1,500&display=swap");

* {
  font-family: "Nunito", sons-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-transform: capitalize;
  outline: none;
  border: none;
  text-decoration: none;
  transition: all 0.2s linear;
}
*::selection {
  background: #8fbc8f;
  color: #fff;
}
.w150 {
  width: 200px !important;
}

html {
  overflow-x: hidden;
  scroll-padding-top: 6rem;
  scroll-behavior: smooth;
}
body {
  background-color: #8fbc8f;
}
.form-data-error {
  color: red;
}
.form-data-error input {
  border-color: red;
}
.form-data-error textarea {
  border-color: red;
}
.error-feedback {
  padding-left: 3px;
  font-size: 0.9rem;
}
.container {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
}
.box {
  background: white;
  display: flex;
  flex-direction: column;
  padding: 25px 25px;
  border-radius: 20px;
  box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
    0 32px 64px -48px rgba(0, 0, 0, 0.5);
  width: 450px;
  margin: 0px 10px;
}
.form-box {
  width: 450px;
  margin: 0px 10px;
}
.form-box h1 {
  font-size: 25px;
  font-weight: 600;
  padding-bottom: 10px;
  border-bottom: 1px solid #8fbc8f;
  margin-bottom: 2rem;
  text-align: center;
}
textarea {
  resize: none;
  border: 1px solid #8fbc8f;
  width: 100%;
  font-size: 16px;
  padding: 0 10px;
  border-radius: 5px;
  outline: none;
}
.form-box form .field {
  display: flex;
  margin-bottom: 10px;
  flex-direction: column;
  margin-bottom: 1.3rem;
}
.form-box form label {
  font-size: 10px;
}
.form-box form input {
  height: 40px;
  width: 100%;
  font-size: 16px;
  padding: 0 10px;
  border-radius: 5px;
  border: 1px solid #8fbc8f;
  outline: none;
}
.btn {
  display: inline-block;
  background: #8fbc8f;
  color: #fff;
  padding: 0.8rem 3rem;
  border: 0.2rem solid #8fbc8f;
  cursor: pointer;
  font-size: 1.7rem;
}
.btn:hover {
  background: rgba(255, 255, 255, 0.2);
  color: #8fbc8f;
}
.links {
  padding: 0.5rem 0;
  font-size: 1.5rem;
  color: #666;
}
.links a {
  color: #8fbc8f;
}
.links a:hover {
  color: #333;
  text-decoration: underline;
}

.btnn {
  align-items: center;
  background: #8fbc8f;
  color: white;
  padding: 0.8rem 3rem;
  border: 0.2rem solid #8fbc8f;
  cursor: pointer;
  font-size: 1.7rem;
  border-radius: 0.5rem;
}

.btnn:hover {
  background: white;
  color: #8fbc8f;
}

select {
  height: 40px;
  width: 100%;
  font-size: 16px;
  padding: 0 10px;
  border-radius: 5px;
  border: 1px solid #8fbc8f;
  outline: none;
}

.imgfille {
  padding-left: 20px !important;
  padding-top: 0.5rem !important;
  padding-bottom: 10px !important;
}

.script {
  padding-left: 20px !important;
  padding-top: 0.5rem !important;
}
</style>
