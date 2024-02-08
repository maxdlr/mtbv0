import { BASE_API_URL } from './config.js'
import { get } from './methods.js'

const endPointName = '/prompts'
let url = `${BASE_API_URL}${endPointName}`

export function getAllPrompts(collection, filterBy = '', filterArg = 0) {
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
