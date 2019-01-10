Rails.application.routes.draw do
  get 'aboutpage/about'
  get 'miscpage/misc'
  get 'exppage/exp'
  get 'dillpage/dill'
  get 'edupage/edu'
  get '/A', to: "activitypage#activity"
  get 'newspage/news'
  get 'header_tail/_header_tail'
  get 'header/_header'
  get '/', to: "homepage#home", as: "root"
  # For details on the DSL available within this file, see http://guides.rubyonrails.org/routing.html
end
