<template>
  <v-sheet width="300" class="mx-auto">
    <v-form fast-fail @submit.prevent="save">
      <v-text-field v-model="username" label="First name"></v-text-field>

      <v-text-field v-model="password" label="Last name"></v-text-field>

      <v-btn type="submit" block class="mt-2">Submit</v-btn>

      <v-dialog v-model="showDialog" ref="dialog">
        <v-card>
          <v-card-title>Successful Registration!</v-card-title>

          <v-card-actions>
            <v-btn color="success" flat @click="closeDialog">OK</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-form>
  </v-sheet>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      username: '',
      password: '',
      showDialog: false,
    };
  },
  methods: {
    async save() {
      try {
        const ins = await axios.post('save', {
          username: this.username,
          password: this.password,
        });
        this.showDialog = true;
      } catch (error) {
        console.error(error);
      }
    },
    closeDialog() {
      this.showDialog = false;
    },
  },
};
</script>
