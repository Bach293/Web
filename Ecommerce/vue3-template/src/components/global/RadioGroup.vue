<template>
    <div class="RadioGroup">
      <div
        class="form-check form-check-inline"
        v-for="(option, index) in options"
        :key="index"
      >
        <input
          class="form-check-input"
          type="radio"
          :name="name"
          :id="`inlineRadio${index + 1}`"
          :value="option.value"
          :checked="modelValue === option.value"
          @change="handleChange"
        />
        <label class="form-check-label" :for="`inlineRadio${index + 1}`">
          {{ option.label }}
        </label>
      </div>
      <p class="help-message" v-if="errorMessage">{{ errorMessage }}</p>
    </div>
  </template>
  
  <script setup>
  import { defineProps, defineEmits } from "vue";
  import { useField } from "vee-validate";
  
  const props = defineProps({
    name: {
      type: String,
      required: true,
    },
    modelValue: {
      type: [String, Number],
      required: true,
    },
    options: {
      type: Array,
      required: true,
    },
  });
  
  const emit = defineEmits(["update:modelValue"]);
  
  const { errorMessage, handleChange } = useField(props.name, undefined, {
    initialValue: props.modelValue,
    handleChange: (value) => {
      emit("update:modelValue", value);
    },
  });
  </script>
  
  <style scoped>
  .RadioGroup {
    position: relative;
    margin-bottom: calc(1em * 2);
  }
  
  .help-message {
    position: absolute;
    bottom: calc(-1.5 * 1em);
    left: 0;
    margin: 0;
    font-size: 14px;
    color: var(--error-color);
  }
  </style>