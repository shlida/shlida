export const apiDomain = 'http://localhost:8080/api/v1'
export const loginUrl = apiDomain + '/auth'

/* authen middle ware */
export const userUrl = apiDomain + '/user'

export const getCsrf = function () {
	const element = document.querySelector('meta[name="csrf-token"]')
	const content = element && element.getAttribute("content")

	return content
}

export const getHeader = function () {
  const tokenData = getCsrf()
  const headers = {
    'X-CSRF-TOKEN': tokenData
  }
  return headers
}
