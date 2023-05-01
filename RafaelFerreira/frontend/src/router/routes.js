import { Auth } from "@/stores/auth.js";

export default async function routes(to, from, next) {
  if (to.meta?.auth) {
    const auth = Auth();
    (auth.isAuth) ? next() : next({ name: "login" });
    console.log(to.name);
  } else {
    next();
  }
}