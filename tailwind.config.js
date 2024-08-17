/** @type {import('tailwindcss').Config} */
export default {
   content: [
    './src/**/*.{js,ts,jsx,tsx}', 
    './public/layout.html',
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
     screens: {
      'sm': '480px',  // Small devices
      'md': '768px',  // Medium devices
      'lg': '1024px', // Large devices
      'xl': '1280px', // Extra large devices
      '2xl': '1536px',// 2x extra large devices

      // Custom breakpoints
      'xxl': '1600px', // Extra extra large devices
      'tablet': '540px', // Custom breakpoint for tablets
      'phone': '400px', // Custom breakpoint for phones
    },
    extend: {
      backgroundColor:{
        "light-gray": "#e1dedd",
    },
    },
    fontFamily: {
      sans: ['Roboto'],
      serif: ['Georgia', 'Cambria', 'serif'],
    },
    fontSize: {
      'xs': '0.75rem',
      'sm': '0.875rem',
      'base': '1rem',
      'lg': '1.125rem',
      'xl': '1.25rem',
      '2xl': '1.5rem',
      '3xl': '1.875rem',
      '4xl': '2.25rem',
      '5xl': '3rem',
      '6xl': '3.75rem',
    },
  },
  plugins: [],
}

