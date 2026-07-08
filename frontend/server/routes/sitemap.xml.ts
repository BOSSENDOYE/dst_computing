export default defineEventHandler(async (event) => {
  const config = useRuntimeConfig(event)
  const siteUrl = config.public.siteUrl

  const staticRoutes = [
    { loc: '/', changefreq: 'weekly', priority: '1.0' },
    { loc: '/services', changefreq: 'monthly', priority: '0.9' },
    { loc: '/realisations', changefreq: 'monthly', priority: '0.9' },
    { loc: '/qui-sommes-nous', changefreq: 'monthly', priority: '0.8' },
    { loc: '/blog', changefreq: 'weekly', priority: '0.8' },
    { loc: '/contact', changefreq: 'yearly', priority: '0.7' },
    { loc: '/devis', changefreq: 'monthly', priority: '0.9' },
  ]

  let articles: { slug: string }[] = []
  try {
    articles = await $fetch<{ slug: string }[]>(`${config.public.apiBase}/v1/articles`)
  } catch {
    articles = []
  }

  const urls = [
    ...staticRoutes.map(r => `  <url>\n    <loc>${siteUrl}${r.loc}</loc>\n    <changefreq>${r.changefreq}</changefreq>\n    <priority>${r.priority}</priority>\n  </url>`),
    ...articles.map(a => `  <url>\n    <loc>${siteUrl}/blog/${a.slug}</loc>\n    <changefreq>monthly</changefreq>\n    <priority>0.6</priority>\n  </url>`),
  ]

  const xml = `<?xml version="1.0" encoding="UTF-8"?>\n<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">\n${urls.join('\n')}\n</urlset>\n`

  setHeader(event, 'content-type', 'application/xml; charset=utf-8')
  return xml
})
