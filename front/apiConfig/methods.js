export async function get(url) {
  try {
    const response = await fetch(url, {
      method: 'GET',
      headers: { 'Content-Type': 'application/json', accept: 'application/json' }
    })

    if (!response.ok) {
      console.log(new Error('Failed to fetch data'))
    }

    return await response.json()
  } catch (error) {
    console.error('Error fetching data:', error)
  }
}

export async function post(url, formObject) {
  const requestOptions = {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(formObject)
  }

  const isPosted = false

  fetch(url, requestOptions).then((response) => {
    if (response.ok) {
      console.log('This was posted: -----', JSON.stringify(formObject))
      return true
    }

    if (!response.ok) {
      console.log(response.error)
      console.log('This was the attempted post body: ----', JSON.stringify(formObject))
      return false
    }
  })
}
