import { BASE_API_URL } from './config.js'
import { get, post } from './methods.js'

const endPointName = '/prompts'
let url = `${BASE_API_URL}${endPointName}`

export function getPrompts(collection, filterBy = '', filterArg = 0) {
  if (filterBy === '' || filterArg === 0) {
    return get(url).then((r) => (collection.value = r))
  }

  if (filterBy === 'year') {
    url += '?promptList.year='
    url += filterArg
  }

  if (filterBy === 'nameFr' || filterBy === 'name') {
    url += '?nameFr='
    url += filterArg
  }

  if (filterBy === 'nameEn') {
    url += '?nameEn='
    url += filterArg
  }

  return get(url).then((r) => (collection.value = r))
}

export function postPrompt(formObject) {
  return post(url, formObject)
}

export function promptExists(nameFr) {
  url += '/nameFr/' + nameFr
  console.log(url)
  return get(url).then((r) => r.status === 200)
}
