<template>
  <div
    class="FormSelect"
    :class="{ 'has-error': !!errorMessage, success: meta.valid }"
  >
    <select
      :name="name"
      :id="name"
      :value="value"
      @change="handleChange"
      @blur="handleBlur"
    >
      <slot></slot>
    </select>
    <p class="help-message" v-if="errorMessage || meta.valid">
      {{ errorMessage || successMessage }}
    </p>
  </div>
</template>
  
<script setup>
import { toRef, defineProps } from "vue";
import { useField } from "vee-validate";

const props = defineProps({
  value: {
    type: String,
    default: undefined,
  },
  name: {
    type: String,
    required: true,
  },
  successMessage: {
    type: String,
    default: "",
  },
  class: {
    type: String,
    default: "",
  },
});

const name = toRef(props, "name");

const { value, errorMessage, handleBlur, handleChange, meta } = useField(
  name,
  undefined,
  {
    initialValue: props.value,
  }
);
</script>
  
  <style scoped>
/* Các style trước đó cho input vẫn được giữ nguyên */
.FormSelect {
  position: relative;
  margin-bottom: calc(1em * 2);
  width: 100%;
}

select {
  border-radius: 5px;
  border: 2px solid transparent;
  padding: 12px 15px;
  outline: none;
  background-color: white;
  border: 2px solid #e3e3e3;
  width: 100%;
  transition: border-color 0.3s ease-in-out, color 0.3s ease-in-out,
    background-color 0.3s ease-in-out;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url('@/assets/img/dropdown_arrow.png');
  background-repeat: no-repeat;
  background-position: right 1em center; /* Điều chỉnh vị trí của mũi tên */
  background-size: 1.3em;
}

select:focus {
  border-color: var(--primary-color);
}

.help-message {
  position: absolute;
  bottom: calc(-1.5 * 1em);
  left: 0;
  margin: 0;
  font-size: 14px;
}

.FormSelect.has-error select {
  background-color: var(--error-bg-color);
  color: var(--error-color);
}

.FormSelect.has-error select:focus {
  border-color: var(--error-color);
}

.FormSelect.has-error .help-message {
  color: var(--error-color);
}

.FormSelect.success select {
  background-color: var(--success-bg-color);
  color: var(--success-color);
}

.FormSelect.success select:focus {
  border-color: var(--success-color);
}

.FormSelect.success .help-message {
  color: var(--success-color);
}
</style>