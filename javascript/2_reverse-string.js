function reverseString(string) {
  if (typeof string !== "string") {
    throw new Error(
      "The 'reverseString' function takes only strings as parameters."
    )
  }

  return string.split("").reverse().join("")
}

console.log(reverseString("symfony"))

// descomenta la siguiente línea para causar un excepción
//console.log(reverseString(42))
