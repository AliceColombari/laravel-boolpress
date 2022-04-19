<template>

  <div>

    <div class="container-title text-center">
      <h1>Contattaci</h1>
      <p>Parliamo del vostro sito Web o di un vostro progetto. Inviateci un messaggio e vi contatteremo entro un giorno lavorativo.</p>
    </div>

    <div class="container mt-5">
      <div class="row">
        <div class="col-12">
            <form @submit.prevent="sendForm">

                <div v-if="success" class="alert alert-success">
                    Email inviata con successo!!
                </div>

                <div class="form-group">
                    <label for="name">Come ti chiami?</label>
                    <input type="text" class="form-control" :class="{'is-invalid':errors.name}" id="name" name="name" v-model="name">
                    <p v-for="(error, index) in errors.name" :key="'error_name'+index" class="invalid-feedback">
                        {{error}}
                    </p>
                </div>

                <div class="form-group">
                    <label for="email">Inserisci la tua email</label>
                    <input type="email" class="form-control" :class="{'is-invalid':errors.email}" id="email" name="email" v-model="email">
                    <p v-for="(error, index) in errors.email" :key="'error_email'+index" class="invalid-feedback">
                        {{error}}
                    </p>
                </div>

                <div class="form-group">
                    <label for="message">Cosa vuoi dirci?</label>
                    <textarea class="form-control" :class="{'is-invalid':errors.message}" id="message" rows="10" name="message" v-model="message"></textarea>
                    <p v-for="(error, index) in errors.message" :key="'error_message'+index" class="invalid-feedback">
                        {{error}}
                    </p>
                </div>

                <button type="submit" class="btn ms_btn-primary">{{sendingInProgress?'Invio in corso':'Invia'}}</button>

            </form>
        </div>
      </div>
    </div>

  </div>
  
</template>

<script>
export default {
  name: "Contact",
  data() {
      return {
            name: '',
            email: '',
            message: '',
            sendingInProgress: false,
            errors: {},
            success: false,
      }
  },
  methods: {
      sendForm() {
          this.sendingInProgress = true;
          axios.post('/api/contacts', {
              'name': this.name,
              'email': this.email,
              'message': this.message
          }).then(response => {
            this.sendingInProgress = false;
            if (response.data.errors) {
                this.errors = response.data.errors;
                this.success = false;
            } else {
                this.success = true;
                // resetto tutti i valori all'aggiornamento / invio dati
                this.name = '';
                this.email = '';
                this.message = '';
                this.errors = {};
            }
          });
      }
  }
};
</script>

<style>
  .container-title {
    background-color: #0073aa;
    color: #fff;
    padding: 30px;
  }

  .ms_btn-primary {
    background-color: #0073aa;
    color: #fff;
  }
</style>