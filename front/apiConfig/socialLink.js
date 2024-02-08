import { BASE_API_URL } from './config.js'
import { get } from './methods.js'

const endPointName = '/social_links'
let url = `${BASE_API_URL}${endPointName}`

export function getAllSocialLinks(collection) {
  return get(url).then((r) => (collection.value = r))
}

export function getSocialLink(name, item) {
  url += '/name/' + name

  return get(url).then((r) => (item.value = r))
}
