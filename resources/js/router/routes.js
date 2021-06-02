function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/', name: 'welcome', component: page('welcome.vue') },

  { path: '/login', name: 'login', component: page('auth/login.vue') },
  { path: '/register', name: 'register', component: page('auth/register.vue') },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue') },
  { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue') },

  { path: '/home', name: 'home', component: page('home.vue') },
  
  { path: '/groups', name: 'groups', component: page('groups/groups.vue') },
  { path: '/groups/create', name: 'groups.create', component: page('groups/create_group.vue') },
  { path: '/groups/edit', name: 'groups.edit', component: page('groups/edit_group.vue') },
  { path: '/users', name: 'users', component: page('users/users.vue') },
  { path: '/users/create', name: 'users.create', component: page('users/create_user.vue') },
  { path: '/users/edit', name: 'users.edit', component: page('users/edit_user.vue') },
  { path: '/scores', name: 'scores', component: page('scores/scores.vue') },
  { path: '/scores/create', name: 'scores.create', component: page('scores/create_score.vue') },
  { path: '/scores/edit', name: 'scores.edit', component: page('scores/edit_score.vue') },
  {
    path: '/settings',
    component: page('settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: page('settings/password.vue') }
    ]
  },

  { path: '*', component: page('errors/404.vue') }
]