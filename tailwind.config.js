const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
  darkMode: "class",
  content: [
    "./_pages/**/*.blade.php",
    "./resources/views/**/*.blade.php",
    "./vendor/hyde/framework/resources/views/**/*.blade.php",
  ],

  theme: {
    extend: {
      typography: {
        DEFAULT: {
          css: {
            lineHeight: "1.5em",
            maxWidth: "96ch",
            h2: {
              marginBottom: "0.75em",
              marginTop: "1.5em",
            },
            a: {
              color: "#5956eb",
              "&:hover": {
                color: "#4f46e5",
              },
              textDecoration: "none",
            },
            blockquote: {
              backgroundColor: "#80808020",
              borderLeftColor: "#d1d5db",
              color: "unset",
              fontWeight: 500,
              fontStyle: "unset",
              lineHeight: "1.25em",
              paddingLeft: "0.75em",
              paddingTop: ".25em",
              paddingBottom: ".25em",
              marginTop: "1em",
              marginBottom: "1em",
              p: {
                paddingRight: ".25em",
                marginTop: ".25em",
                marginBottom: ".25em",
              },
              "p::before": {
                content: "unset",
              },
              "p::after": {
                content: "unset",
              },
            },
            "code:not(pre code)": {
              font: "unset",
              backgroundColor: "#80808033",
              paddingLeft: "4px",
              paddingRight: "4px",
              marginLeft: "-2px",
              marginRight: "1px",
              borderRadius: "4px",
              maxWidth: "80vw",
              overflowX: "auto",
              verticalAlign: "top",
              wordBreak: "break-all",
            },
            "code::before": {
              content: "unset",
            },
            "code::after": {
              content: "unset",
            },
            pre: {
              backgroundColor: "#292D3E",
              borderRadius: "0.25rem",
              marginTop: "1rem",
              marginBottom: "1rem",
              overflowX: "auto",
              code: {
                fontFamily:
                  "'Fira Code Regular', Consolas, Monospace, 'Courier New'",
              },
            },
          },
        },
        invert: {
          css: {
            a: {
              color: "#818cf8",
              "&:hover": {
                color: "#6366f1",
              },
            },
          },
        },
      },
      colors: {
        indigo: {
          50: "#eef2ff",
          100: "#e0e7ff",
          200: "#c7d2fe",
          300: "#a5b4fc",
          400: "#818cf8",
          500: "#6366f1",
          600: "#5956eb",
          700: "#4f46e5",
          800: "#4338ca",
          900: "#3730a3",
        },
        primary: {
          DEFAULT: "#5956eb",
          light: "#818cf8",
          dark: "#4f46e5",
        },
      },
      fontFamily: {
        sans: [
          "Inter",
          "ui-sans-serif",
          "system-ui",
          "-apple-system",
          "BlinkMacSystemFont",
          "Segoe UI",
          "Roboto",
          "sans-serif",
        ],
        display: [
          "Inter",
          "ui-sans-serif",
          "system-ui",
          "-apple-system",
          "BlinkMacSystemFont",
          "Segoe UI",
          "Roboto",
          "sans-serif",
        ],
        khmer: [
          "Kantumruy Pro",
          "Inter",
          "ui-sans-serif",
          "system-ui",
          "sans-serif",
        ],
        mono: [
          "ui-monospace",
          "SFMono-Regular",
          "Monaco",
          "Consolas",
          "monospace",
        ],
      },
      animation: {
        "fade-in": "fadeIn 0.5s ease-in",
        "slide-up": "slideUp 0.5s ease-out",
        float: "float 3s ease-in-out infinite",
        "float-slow": "floatSlow 6s ease-in-out infinite",
        "float-medium": "floatMedium 4s ease-in-out infinite",
        "float-fast": "floatFast 2.5s ease-in-out infinite",
        "float-gentle": "floatGentle 4s ease-in-out infinite",
        "particle-float": "particleFloat 8s ease-in-out infinite",
        "rotate-slow": "rotateSlow 20s linear infinite",
      },
      keyframes: {
        fadeIn: {
          "0%": { opacity: "0" },
          "100%": { opacity: "1" },
        },
        slideUp: {
          "0%": { transform: "translateY(20px)", opacity: "0" },
          "100%": { transform: "translateY(0)", opacity: "1" },
        },
        float: {
          "0%, 100%": { transform: "translateY(0px) translateX(0px)" },
          "50%": { transform: "translateY(-15px) translateX(10px)" },
        },
        floatSlow: {
          "0%, 100%": { transform: "translateY(0px) translateX(0px)" },
          "33%": { transform: "translateY(-20px) translateX(15px)" },
          "66%": { transform: "translateY(-10px) translateX(-10px)" },
        },
        floatMedium: {
          "0%, 100%": { transform: "translateY(0px) translateX(0px)" },
          "50%": { transform: "translateY(-25px) translateX(-15px)" },
        },
        floatFast: {
          "0%, 100%": { transform: "translateY(0px) translateX(0px)" },
          "50%": { transform: "translateY(-18px) translateX(12px)" },
        },
        floatGentle: {
          "0%, 100%": { transform: "translateY(0px)" },
          "50%": { transform: "translateY(-8px)" },
        },
        particleFloat: {
          "0%, 100%": {
            transform: "translateY(0px) translateX(0px) rotate(0deg)",
            opacity: "0.4",
          },
          "25%": {
            transform: "translateY(-30px) translateX(20px) rotate(90deg)",
            opacity: "0.6",
          },
          "50%": {
            transform: "translateY(-50px) translateX(0px) rotate(180deg)",
            opacity: "0.8",
          },
          "75%": {
            transform: "translateY(-30px) translateX(-20px) rotate(270deg)",
            opacity: "0.6",
          },
        },
        rotateSlow: {
          "0%": { transform: "rotate(0deg)" },
          "100%": { transform: "rotate(360deg)" },
        },
      },
    },
  },

  plugins: [require("@tailwindcss/typography")],
};
